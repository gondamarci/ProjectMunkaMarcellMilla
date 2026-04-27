<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Bejelentkezés feldolgozása
    public function login(Request $request)
    {
        // Adatok ellenőrzése
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Beléptetési kísérlet
        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate(); // Biztonsági okokból új session ID

            return redirect()->intended('/'); // Vissza a főoldalra
        }

        // Ha nem sikerült, hibaüzenet
        return back()->withErrors([
            'email' => 'A megadott adatok nem egyeznek.',
        ])->onlyInput('email');
    }

    public function register(Request $request)
    {
        // Validáció: ellenőrizzük, hogy minden adat megvan-e és jó-e
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        // Felhasználó létrehozása
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Azonnali beléptetés regisztráció után
        Auth::login($user);

        // Főoldalra irányítás
        return redirect('/')->with('success', 'Sikeres regisztráció!');
    }

    // Kijelentkezés
    public function logout(Request $request)
    {
        // Kijelentkeztetjük a felhasználót
        Auth::logout();

        // Session érvénytelenítése és új token generálása a biztonság érdekében
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}