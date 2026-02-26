@extends('layouts.app')

@section('content')
<form method="POST" action="/register">
    @csrf
    
    <label>Név:</label>
    <input type="text" name="name" value="{{ old('name') }}" required>
    
    <label>Email:</label>
    <input type="email" name="email" value="{{ old('email') }}" required>
    
    <label>Jelszó:</label>
    <input type="password" name="password" required>
    
    <label>Jelszó újra:</label>
    <input type="password" name="password_confirmation" required>
    
    <button type="submit">Regisztráció</button>
</form>
@endsection