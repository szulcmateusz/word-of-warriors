@extends('layouts.game')

@section('header')
    Warrior
@endsection

@section('content')
    <ul>
        <li>Strength - {{ auth()->user()->warrior->strength }}</li>
        <li>Agility - {{ auth()->user()->warrior->agility }}</li>
    </ul>
@endsection
