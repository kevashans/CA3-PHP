<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('Wise Kevas', 'Wise Kevas') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <style>
        body {
    background-color: #F2F2F2;
    font-family: Arial, sans-serif;
}

#app {
    max-width: 1024px;
    margin: 0 auto;
    background-color: #FFFFFF;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    border-radius: 4px;
    overflow: hidden;
}

.header {
    background-color: #003C46;
    color: #FFFFFF;
    padding: 10px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;
}

.header__logo {
    font-size: 24px;
    font-weight: bold;
    text-decoration: none;
}

.header__menu {
    display: flex;
    gap: 20px;
}

.header__menu a {
    color: #FFFFFF;
    text-decoration: none;
    font-weight: bold;
    font-size: 16px;
    transition: all 0.2s ease-in-out;
}

.header__menu a:hover {
    color: #9BA2A3;
}

.content {
    padding: 20px;
}

.footer {
    background-color: #003C46;
    color: #FFFFFF;
    text-align: center;
    padding: 10px;
    border-bottom-left-radius: 4px;
    border-bottom-right-radius: 4px;
}

/* Additional styles */
.header__menu a.active {
    border-bottom: 2px solid #FFFFFF;
}

.content img {
    max-width: 100%;
    border-radius: 4px;
}
    </style>
</head>
<body >
    <div id="app">
        <header class="header">
            <a href="/" class="header__logo">{{ config('Wise Kevas', 'Wise Kevas') }}</a>
            <nav class="header__menu">
                <a href="/">Home</a>
                <a href="/forums">Forums</a>
                <a href="/followed">Followed</a>
                @guest
                    <a href="{{ route('login') }}">{{ __('Login') }}</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                @else
                    <span>{{ Auth::user()->name }}</span>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        {{ csrf_field() }}
                    </form>
                @endguest
            </nav>
        </header>

        <div class="content">
            @yield('content')
        </div>

        <footer class="footer">
            @include('layouts.footer')
        </footer>
    </div>
