<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function userStats()
    {
        // Felhasználó adatinak lekérése
        $users = User::with('personalData')->get();

        return view('pages.admin_users', ['users' => $users]);
    }

    public function destroyUser(User $user)
    {
        // Önvédelmi mechanizmus
        if($user->id === Auth::id()){
            return back()->with('error', 'Magadat nem törölheted a rendszerből');
        }

        // Felhasználó törlése
        $user->delete();

        return back()->with('success', "{$user->name} fiókja és adatai sikeresen törölve");
    }

    
    
}
