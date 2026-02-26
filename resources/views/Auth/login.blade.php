@extends('layouts.app')

@section('content')
    <form method="POST" action="/login">
    @csrf
    <input type="email" name="email" required>
    <input type="password" name="password" required>
    <button type="submit">Belépés</button>
@endsection