@extends('layouts.game')

@section('header')
    Training
@endsection

@section('content')
    <ul>
        <li>
            <span>Strength - {{ auth()->user()->warrior->strength }}</span>
            <form action="{{ route('game.training.train') }}" method="post">
                @csrf
                <input type="hidden" name="skill" value="strength">
                <button>Train</button>
            </form>
        </li>
        <li>
            <span>Agility - {{ auth()->user()->warrior->agility }}</span>
            <form action="{{ route('game.training.train') }}" method="post">
                @csrf
                <input type="hidden" name="skill" value="agility">
                <button>Train</button>
            </form>
        </li>
    </ul>
@endsection
