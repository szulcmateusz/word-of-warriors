@auth()
    <p>E-mail: {{ auth()->user()->email }}</p>
    <p>User: {{ auth()->user()->warrior->name }}</p>

    <p><a href="{{ route('game.warrior') }}">Enter the game</a></p>

    <form method="post" action="{{ route('logout') }}">
        @csrf
        <button>Logout</button>
    </form>
@else
    <h1>Word of warriors</h1>
    <h2>Sign in</h2>
    <form method="post" action="{{ route('auth.authenticate') }}">
        @csrf
        <div>
            <input type="text" name="email">
        </div>
        <div>
            <input type="password" name="password">
        </div>
        <button type="submit">Log in</button>
    </form>
@endauth
