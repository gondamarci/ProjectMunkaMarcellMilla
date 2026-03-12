@extends('layouts.app')

@section('content')


<div class="hero-section">
    <h1>Vedd át az irányítást a tested felett!</h1>
    <p>A FitApp segítségével nem csak számolod a kalóriákat, hanem megérted, hogyan működik a szervezeted. Érd el a céljaidat tudatosan!</p>
    
    @guest
        <a href="{{ route('register') }}" class="cta-button">Vágj bele most ingyen!</a>
    @else
        <a href="{{ route('profile.edit') }}" class="cta-button">Frissítsd az adataidat!</a>
    @endguest

    <div class="info-grid">
        <div class="info-card">
            <i>🔥</i>
            <h3>Mi az a kalória?</h3>
            <p>A kalória az az energia, amit az ételekből nyerünk. Ha több energiát viszel be, mint amennyit elégetsz, hízol. Ha kevesebbet, fogysz. Ilyen egyszerű a matek!</p>
        </div>

        <div class="info-card">
            <i>⚖️</i>
            <h3>BMR és TDEE</h3>
            <p>A BMR az az energiamennyiség, amit a tested akkor is eléget, ha egész nap csak fekszel. Mi segítünk kiszámolni ezt az aktivitásod alapján, hogy pontosan tudd, mennyit ehetsz.</p>
        </div>

        <div class="info-card">
            <i>🍎</i>
            <h3>Tudatos táplálkozás</h3>
            <p>Nem kell éhezned a sikerhez! A lényeg a megfelelő tápanyagok elosztása. Figyeld a fehérjét, szénhidrátot és zsírt, hogy az izmaid épüljenek, ne a zsírszöveted.</p>
        </div>
    </div>

    <div class="stats-bar">
        <h2>Miért válaszd a FitApp-ot?</h2>
        <p>Személyre szabott számítások • Egyszerű kezelőfelület • Motiváló közösség • Teljesen ingyenes</p>
    </div>
</div>
@endsection