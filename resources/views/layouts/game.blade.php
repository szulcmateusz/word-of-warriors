<h1>@yield('header')</h1>

<div>
    <h3>Info</h3>
    <ul>
        <li>Name: {{ auth()->user()->warrior->name }}</li>
        <li>Points: {{ auth()->user()->warrior->points }}</li>
        <li>Gold: {{ auth()->user()->warrior->gold }}</li>
    </ul>
</div>

@if (auth()->user()->warrior->event)
    <p>Current action: {{ auth()->user()->warrior->event->action }} - {{ \Carbon\Carbon::now()->diff(auth()->user()->warrior->event->end_date)->format('%H:%I:%S') }}</p>
    <form action="{{ route('game.warrior.stopAction') }}" method="post">
        @csrf
        @method('delete')
        <button type="submit">Stop the action</button>
    </form>
@else
    <p>Current action: -</p>
@endif

<nav>
    <h3>Menu</h3>
    <ul>
        <li><a href="{{ route('game.warrior') }}">Warrior</a></li>
        <li><a href="{{ route('game.training') }}">Training</a></li>
        <li><a href="#">Adventure</a></li>
    </ul>

    <form method="post" action="{{ route('logout') }}">
        @csrf
        <button>Logout</button>
    </form>
</nav>

@if (session('info'))
    <div>
        {{ session('info') }}
    </div>
@endif

@yield('content')

<footer>
    <small>Server time: {{ date("d-m-Y H:i:s") }}</small>
</footer>
