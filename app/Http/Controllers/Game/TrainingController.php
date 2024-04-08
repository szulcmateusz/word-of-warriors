<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use App\Jobs\TrainingJob;
use App\Models\JobWarrior;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TrainingController extends Controller
{
    public function index()
    {
//        dd(new Datetime());
//        $currentDate = Carbon::now()->toDate();
        return view('game.training');
    }

    public function train(Request $request)
    {
        $skill = $request->get('skill');
        $warrior = Auth::user()->warrior;

        switch ($skill) {
            case 'strength':
                $cost = round($warrior->strength * 1.4);

                if ($cost > $warrior->gold) {
                    return redirect()->back()->with('info', 'No money');
                }

                if (auth()->user()->warrior->job) {
                    return redirect()->back()->with('info', 'The warrior is currently performing another action.');
                }

                $warrior->gold = $warrior->gold - $cost;
                $time = 16;
                $finishDate = (new DateTime())->modify("+$time seconds");

                TrainingJob::dispatch($warrior, $skill)->delay($finishDate);
                $jobId = DB::table('jobs')->latest('id')->first()->id;

                JobWarrior::create([
                    'warrior_id' => $warrior->id,
                    'job_id' => $jobId,
                    'action' => 'training:strength',
                    'end_date' => $finishDate,
                ]);

                break;
            case 'agility':
                $cost = round($warrior->strength * 1.3);

                if ($cost > $warrior->gold) {
                    return redirect()->back()->with('info', 'No money');
                }

                if (auth()->user()->warrior->job) {
                    return redirect()->back()->with('info', 'The warrior is currently performing another action.');
                }

                $warrior->gold = $warrior->gold - $cost;
                $time = 12;
                $finishDate = (new DateTime())->modify("+$time seconds");

                TrainingJob::dispatch($warrior, $skill)->delay($finishDate);
                $jobId = DB::table('jobs')->latest('id')->first()->id;

                JobWarrior::create([
                    'warrior_id' => $warrior->id,
                    'job_id' => $jobId,
                    'action' => 'training:agility',
                    'end_date' => $finishDate,
                ]);

                break;
            default:
                return redirect()->back();
        }
        $warrior->save();
        return redirect()->back();
    }
}
