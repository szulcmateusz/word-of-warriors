<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;

class WarriorController extends Controller
{
    public function index()
    {
        return view('game.warrior');
    }
}
