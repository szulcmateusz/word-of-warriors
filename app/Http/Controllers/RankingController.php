<?php

namespace App\Http\Controllers;

use App\Models\Warrior;

class RankingController extends Controller
{
    public function index() {
        $warriors = Warrior::select('name', 'points')->orderBy('points', 'desc')->get();

        return view('game.ranking', [
            'warriors' => $warriors,
        ]);
    }
}
