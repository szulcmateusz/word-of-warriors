@auth()
    <p>E-mail: {{ auth()->user()->email }}</p>
    <p>User: {{ auth()->user()->warrior->name }}</p>

    <form method="post" action="{{ route('logout') }}">
        @csrf
        <button>Logout</button>
    </form>
@else
    <a href="{{ route('auth.loginForm') }}">Login form</a>
@endauth
