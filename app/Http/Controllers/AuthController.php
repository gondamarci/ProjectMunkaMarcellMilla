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

    public function register(Request $request)
    {
        // 1. Validáció: ellenőrizzük, hogy minden adat megvan-e és jó-e
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:8'], // A 'confirmed' elvár egy password_confirmation mezőt!
        ]);

        // 2. Felhasználó létrehozása
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Titkosítjuk a jelszót
        ]);

        // 3. Azonnali beléptetés regisztráció után
        Auth::login($user);

        // 4. Irány a főoldal
        return redirect('/')->with('success', 'Sikeres regisztráció!');
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