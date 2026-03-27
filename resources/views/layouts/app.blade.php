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
        @auth
            {{-- Ha van már megadott személyes adata --}}
            @if(Auth::user()->personalData)
                <a href="{{ route('calories.index') }}" class="btn-primary">
                    Kalóriaszámítás
                </a>
                
                {{-- Ide kerül az új Előzmények gomb --}}
                <a href="{{ route('calories.history') }}" class="btn-primary" style="background: linear-gradient(135deg, #666, #444);">
                    Előzmények
                </a>
                {{-- 3. ÚJ: Étel Adatbázis gomb (kékebb vagy zöldebb tónus, hogy elváljon) --}}
                <a href="{{ route('food.index') }}" class="btn-primary" style="background: linear-gradient(135deg, #4A90E2, #357ABD);">
                    Étel Adatbázis
                </a>
            @endif
        @endauth
        </div>

        <div class="nav-auth">
            @auth
                <span class="nav-link" style="color: #FF8C42; font-weight: bold;">
    ⚖️ {{ \App\Http\Controllers\WeightLogController::currentWeight() }} kg
</span>
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