@extends('layouts.app')

@section('content')
<div class="auth-container">
    <h2>Bejelentkezés</h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <label>E-mail cím</label>
            <input type="email" name="email" value="{{ old('email') }}" required autofocus>
            @error('email') <span class="error-text">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label>Jelszó</label>
            <input type="password" name="password" required>
            @error('password') <span class="error-text">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="submit-btn">Belépés</button>

        <div class="auth-footer">
            Nincs még fiókod? <a href="{{ route('register') }}">Regisztrálj itt!</a>
        </div>
    </form>
</div>
@endsection