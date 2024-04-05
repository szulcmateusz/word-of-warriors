<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        switch ($skill) {
            case 'strength':
                $cost = round($warrior->strength * 1.4);

                if ($cost > $warrior->gold) {
                    return redirect()->back()->with('info', 'No money');
                }

                $warrior->gold = $warrior->gold - $cost;
                $warrior->strength = $warrior->strength + 1;
                break;
            case 'agility':
                $cost = round($warrior->agility * 1.2);

                if ($cost > $warrior->gold) {
                    return redirect()->back()->with('info', 'No money');
                }

                $warrior->gold = $warrior->gold - $cost;
                $warrior->agility = $warrior->agility + 1;
                break;
            default:
                return redirect()->back();
        }
        $warrior->save();
        return redirect()->back();
    }
}
