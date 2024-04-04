@foreach($errors->getMessages() as $error)
    <p>{{ $error[0] }}</p>
@endforeach

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
