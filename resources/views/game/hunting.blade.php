@extends('layouts.game')

@section('header')
    Hunting
@endsection

@section('content')
    <div>
        <p>Thanks to hunting, you will earn money.</p>

        <form action="{{ route('game.hunting') }}" method="post">
            @csrf
            <h2>Select a hunting time</h2>
            <select name="hunting-time" class="bg-gray-800 px-5">
                @for ($i = 1; $i <= 8; $i++)
                    <option value="{{ $i }}">{{ $i }} @if($i > 1) hours @else hour @endif ({{ $i * 20 }} gold)</option>
                @endfor
            </select>
            <button @if (auth()->user()->warrior->event) disabled @endif>Go hunting!</button>
        </form>
    </div>
@endsection
