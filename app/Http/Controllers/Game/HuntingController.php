<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use App\Models\WarriorEvent;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HuntingController extends Controller
{
    public function index()
    {
        return view('game.hunting');
    }

    public function hunt(Request $request) {
        $request->validate([
            'hunting-time' => 'min:1|max:8|integer',
        ]);

        $warrior = Auth::user()->warrior;

        $action = $warrior->event()->first();

        if ($action) {
            return redirect()->back()->with('info', 'The warrior is currently performing another action.');
        }

        $huntingTime = $request->get('hunting-time') * 60 * 60;
        $salary = 20 * $huntingTime;

        $finishDate = (new DateTime())->modify("+$huntingTime seconds");
        $finishDateFormatted = $finishDate->format('Y-m-d H:i:s.u');

        $warriorEventId = WarriorEvent::create([
            'warrior_id' => $warrior->id,
            'action' => "hunting",
            'end_date' => $finishDate,
        ])->id;

        DB::statement("CREATE EVENT `$warrior->name` ON SCHEDULE AT '$finishDateFormatted' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE warriors SET gold = gold + '$salary' WHERE `warriors`.`name` = '$warrior->name';");
        DB::statement("CREATE EVENT `delete-$warrior->name` ON SCHEDULE AT '$finishDateFormatted' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM `warrior_events` WHERE `id` = '$warriorEventId';");

        return back();
    }
}
