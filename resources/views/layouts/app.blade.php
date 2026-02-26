<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitApp</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        body {
            background-image: url("{{ asset('images/bg.png') }}");
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            margin: 0;
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>

    <nav>
        <div class="nav-links">
            <a href="/">Főoldal</a>

        </div>

        <div class="nav-auth">
            @auth
            <span style="color: black; margin-right: 15px;">Szia, {{ Auth::user()->username }}!</span>
        
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="logout-button" style="background: #FF8C42; color: white; border: none; padding: 5px 15px; border-radius: 5px; cursor: pointer;">
                Kijelentkezés
            </button>
        </form>
    @else
        <a href="{{ route('login') }}">Bejelentkezés</a>
        <a href="{{ route('register') }}">Regisztráció</a>
    @endauth
        </div>
    </nav>

    @yield('head.message')

    <div class="container">
        @yield('content')
    </div>

</body>
</html>