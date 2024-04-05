<h1>@yield('header')</h1>

<div>
    <h3>Info</h3>
    <ul>
        <li>Name: {{ auth()->user()->warrior->name }}</li>
        <li>Points: {{ auth()->user()->warrior->points }}</li>
        <li>Gold: {{ auth()->user()->warrior->gold }}</li>
    </ul>
</div>

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
