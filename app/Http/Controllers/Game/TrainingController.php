<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use App\Models\WarriorEvent;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TrainingController extends Controller
{
    public function index()
    {
        return view('game.training');
    }

    public function train(Request $request)
    {
        $skill = $request->get('skill');
        $warrior = Auth::user()->warrior;

        $action = $warrior->event()->first();

        if ($action) {
            return redirect()->back()->with('info', 'The warrior is currently performing another action.');
        }

        switch ($skill) {
            case 'strength':
                $cost = round($warrior->$skill * 1.5);
                $time = 10;

                break;
            case 'agility':
                $cost = round($warrior->$skill * 1.3);
                $time = 20;

                break;
            default:
                return redirect()->back();
        }

        if ($cost > $warrior->gold) {
            return redirect()->back()->with('info', 'No money');
        }

        $warrior->gold = $warrior->gold - $cost;

        $skillPoint = $warrior->$skill + 1;
        $finishDate = (new DateTime())->modify("+$time seconds");
        $finishDateFormatted = $finishDate->format('Y-m-d H:i:s.u');

        $warriorEventId = WarriorEvent::create([
            'warrior_id' => $warrior->id,
            'action' => "training:$skill",
            'end_date' => $finishDate,
        ])->id;

        DB::statement("CREATE EVENT `$warrior->name` ON SCHEDULE AT '$finishDateFormatted' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE `warriors` SET `$skill` = $skillPoint WHERE `warriors`.`name` = '$warrior->name';");
        DB::statement("CREATE EVENT `delete-$warrior->name` ON SCHEDULE AT '$finishDateFormatted' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM `warrior_events` WHERE `id` = '$warriorEventId';");

        $warrior->save();
        return redirect()->back();
    }
}
