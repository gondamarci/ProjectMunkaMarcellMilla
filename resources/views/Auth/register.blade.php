@extends('layouts.app')

@section('content')
<div class="auth-container">
    <h2>Regisztráció</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group">
            <label>Felhasználónév</label>
            <input type="text" name="username" value="{{ old('username') }}" required>
            @error('username') <span class="error-text">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label>E-mail cím</label>
            <input type="email" name="email" value="{{ old('email') }}" required>
            @error('email') <span class="error-text">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label>Jelszó</label>
            <input type="password" name="password" required>
            @error('password') <span class="error-text">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label>Jelszó újra</label>
            <input type="password" name="password_confirmation" required>
        </div>

        <button type="submit" class="submit-btn">Fiók létrehozása</button>

        <div class="auth-footer">
            Már van fiókod? <a href="{{ route('login') }}">Jelentkezz be!</a>
        </div>
    </form>
</div>
@endsection