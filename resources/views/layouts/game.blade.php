<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Battle of warriors</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=MedievalSharp&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body class="flex flex-col
@switch(Illuminate\Support\Facades\Route::currentRouteName())
    @case('game.hunting')
        bg-hunting
        @break
    @case('game.training')
        bg-training
        @break
    @case('game.ranking')
        bg-ranking
        @break
    @endswitch
">

<nav id="main-menu">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">
                <li>
                    <a href="{{ route('game.warrior') }}"
                       class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:p-0 md:hover:text-blue-700 md:dark:bg-transparent @if(Illuminate\Support\Facades\Route::is('game.warrior')) md:dark:text-blue-500 @endif"
                       aria-current="page">Warrior</a>
                </li>

                <li>
                    <a href="{{ route('game.ranking') }}"
                       class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent @if(Illuminate\Support\Facades\Route::is('game.ranking')) md:dark:text-blue-500 @endif">Ranking</a>
                </li>
                <li>
                    <form method="post" action="{{ route('logout') }}">
                        @csrf
                        <button
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
        <a href="{{ route('game.warrior') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="/assets/images/logo.png" class="h-8" alt="Battle of warriors logo"/>
        </a>
        <button data-collapse-toggle="navbar-dropdown" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-dropdown" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">
                <li>
                    <a href="{{ route('game.hunting') }}"
                       class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent @if(Illuminate\Support\Facades\Route::is('game.hunting')) md:dark:text-blue-500 @endif">Hunting</a>
                </li>
                <li>
                    <a href="{{ route('game.training') }}"
                       class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent @if(Illuminate\Support\Facades\Route::is('game.training')) md:dark:text-blue-500 @endif">Training</a>
                </li>
                <li>
                    <a href="#"
                       class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Adventure</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="bg-black-04">
    <div class="max-w-screen-xl flex flex-wrap  items-center justify-between mx-auto p-4">
        <ul class="flex justify-around w-full text-white">
            <li>
                @if (auth()->user()->warrior->event)
                    Current action: {{ auth()->user()->warrior->event->action }}
                    - {{ \Carbon\Carbon::now()->diff(auth()->user()->warrior->event->end_date)->format('%H:%I:%S') }}
                    <form action="{{ route('game.warrior.stopAction') }}" method="post" class="inline">
                        @csrf
                        @method('delete')
                        <button class="inline-block" type="submit">❌</button>
                    </form>
                @else
                    Current action: -
                @endif
            </li>
            <li>🔱 {{ auth()->user()->warrior->name }}</li>
            <li>🪙 {{ auth()->user()->warrior->gold }}</li>
            <li>⚔️ {{ auth()->user()->warrior->points }}</li>
            <li>🎖 {{ auth()->user()->warrior->rankingPosition() }}</li>
        </ul>
    </div>
</div>

<div class="container mx-auto p-4 my-4 bg-black-04 text-white grow">
    <h1 class="text-center text-2xl">@yield('header')</h1>

    @if (session('info'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('info') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path
            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
  </span>
        </div>
    @endif

    @yield('content')

</div>
<footer class="text-center text-white bg-black-04">
    <small>Server time: <span id="server-time">{{ date("d-m-Y H:i:s") }}</span></small>
</footer>
<script src="/assets/js/script.js"></script>
</body>
</html>
