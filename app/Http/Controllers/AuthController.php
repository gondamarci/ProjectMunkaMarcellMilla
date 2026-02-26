<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Bejelentkezés feldolgozása
    public function login(Request $request)
    {
        // 1. Adatok ellenőrzése
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Beléptetési kísérlet
        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate(); // Biztonsági okokból új session ID

            return redirect()->intended('/'); // Vissza a főoldalra
        }

        // 3. Ha nem sikerült, hibaüzenet
        return back()->withErrors([
            'email' => 'A megadott adatok nem egyeznek.',
        ])->onlyInput('email');
    }

    // Kijelentkezés
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}