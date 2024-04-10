@extends('layouts.game')

@section('header')
    Ranking
@endsection

@section('content')
    <div>
        <table>
            <thead>
            <tr>
                <th>Name</th>
                <th>Points</th>
            </tr>
            </thead>
            <tbody>
            @foreach($warriors as $warrior)
                <tr>
                    <th>{{ $warrior->name }}</th>
                    <td>{{ $warrior->points }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
