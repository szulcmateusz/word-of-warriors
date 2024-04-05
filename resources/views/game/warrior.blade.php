<h1>Warrior</h1>

<nav>
    <ul>
        <li><a href="#">Warrior</a></li>
        <li><a href="#">Training</a></li>
        <li><a href="#">Adventure</a></li>
    </ul>
</nav>
<form method="post" action="{{ route('logout') }}">
    @csrf
    <button>Logout</button>
</form>

<ul>
    <li>Name: {{ auth()->user()->warrior->name }}</li>
    <li>Points: {{ auth()->user()->warrior->points }}</li>
    <li>Gold: {{ auth()->user()->warrior->gold }}</li>
</ul>

<p>Server time: {{ date("d-m-Y H:i:s") }}</p>
