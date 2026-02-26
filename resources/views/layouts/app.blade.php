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
            <a>Bejelentkezés</a>
            <a>Regisztráció</a>
        </div>
    </nav>

    <h1>Üdvözlünk a FitApp oldalon, ahol a kalóriák nem menekülhetnek előled</h1>

    <div class="container">
        @yield('content')
    </div>

</body>
</html>