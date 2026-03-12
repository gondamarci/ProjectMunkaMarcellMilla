<!DOCTYPE html>
<html lang="hu">
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
            font-family: 'Segoe UI', Arial, sans-serif;
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
                <div class="dropdown">
                    <span class="dropdown-trigger">
                        Szia, {{ Auth::user()->username }}! ▼
                    </span>
                    <div class="dropdown-content">
                        <a href="{{ route('profile.edit') }}">
                            ⚙️ Adatok megadása
                        </a>
                        
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="logout-button-inner">
                                🚪 Kijelentkezés
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}">Bejelentkezés</a>
                <a href="{{ route('register') }}" style="background: white; color: #D7263D; padding: 8px 15px; border-radius: 5px;">Regisztráció</a>
            @endauth
        </div>
    </nav>

    @yield('head.message')

    <div class="container">
        @yield('content')
    </div>

</body>
</html>