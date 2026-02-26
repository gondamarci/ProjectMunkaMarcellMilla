@extends('layouts.app')

@section('head.message')
<h1>Üdvözlünk a FitApp oldalon, ahol a kalóriák nem menekülhetnek előled</h1>
<p>Köszönjük hogy regisztrál oldalunkra</p>
@endsection



@section('content')

@if ($errors->any())
    <div style="color: red; border: 1px solid red; padding: 10px; margin-bottom: 20px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="/register">
    @csrf
    
    <input type="text" name="username" value="{{ old('username') }}" placeholder="Név">
    @error('username') <span style="color:red">{{ $message }}</span> @enderror

    <input type="email" name="email" value="{{ old('email') }}" placeholder="Email">
    @error('email') <span style="color:red">{{ $message }}</span> @enderror

    <input type="password" name="password" placeholder="Jelszó">
    @error('password') <span style="color:red">{{ $message }}</span> @enderror

    <input type="password" name="password_confirmation" placeholder="Jelszó újra">
    
    <button type="submit">Regisztráció</button>
</form>
@endsection