<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiAdminController extends Controller
{
    // Összes felhasználó listázása adatokkal együtt
    public function userStats()
    {
        // Csak admin férhet hozzá (biztonsági ellenőrzés az API-ban is)
        if (!Auth::user()->is_admin) {
            return response()->json([
                'success' => false,
                'message' => 'Hozzáférés megtagadva. Csak adminisztrátoroknak!'
            ], 403);
        }

        $users = User::with('personalData')->get();

        return response()->json([
            'success' => true,
            'users' => $users
        ]);
    }

    // Felhasználó törlése
    public function destroyUser($id)
    {
        // Admin ellenőrzés
        if (!Auth::user()->is_admin) {
            return response()->json([
                'success' => false,
                'message' => 'Nincs jogosultságod a művelethez!'
            ], 403);
        }

        $user = User::find($id);

        // Létezik-e a felhasználó?
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'A felhasználó nem található.'
            ], 404);
        }

        // Önvédelmi mechanizmus (ne tudd törölni magad)
        if ($user->id === Auth::id()) {
            return response()->json([
                'success' => false,
                'message' => 'Magadat nem törölheted a rendszerből!'
            ], 400);
        }

        // Törlés
        $user->delete();

        return response()->json([
            'success' => true,
            'message' => "{$user->name} fiókja és adatai sikeresen törölve."
        ]);
    }
}
