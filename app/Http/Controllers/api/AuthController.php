<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // beérkező adatok validációja
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Felhasználó megkeresése az email cím alapján
        $user = User::where('email', $request->email)->first();

        // User létezésének ellenőrzése és jelszó ellenőrzés
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Hibás e-mail cím vagy jelszó'
            ], 401);
        }

        // Token generálása
        $token = $user->createToken('api_token')->plainTextToken;

        // Válasz küldése a mobilnak
        return response()->json([
            'status' => 'success',
            'api_token' => $token,
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email
            ]
        ], 200);
    }

    public function logout(Request $request)
    {
        //Aktuális token törlése az adatbázisból
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status' => 'success',
            'message' => "Sikeres kijelentkezés."
        ]);
    }
}