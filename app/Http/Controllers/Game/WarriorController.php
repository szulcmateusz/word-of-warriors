<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WarriorController extends Controller
{
    public function index()
    {
        return view('game.warrior');
    }

    public function stopAction()
    {
        $warrior = Auth::user()->warrior;

        if (!$warrior->event) {
            return back()->with('info', 'There is no action to interrupt');
        }

        $eventName = $warrior->name;

        DB::statement("DROP EVENT IF EXISTS `$eventName`");
        DB::statement("DROP EVENT IF EXISTS `delete-$eventName`");
        $warrior->event->first()->delete();

        return back()->with('info', 'The action was interrupted');
    }
}
