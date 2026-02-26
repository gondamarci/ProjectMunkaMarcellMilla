@extends('layouts.app')

@section('head.message')
<h1>Üdvözlünk ismét a FitApp oldalon, ahol a kalóriák nem menekülhetnek előled</h1>
@endsection

@section('content')
    <form action="{{ route('login') }}" method="POST">
    @csrf
    <input type="email" name="email" required>
    <input type="password" name="password" required>
    <button type="submit">Belépés</button>

    @if ($errors->any())
        <div style="color: red; margin-top: 10px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection