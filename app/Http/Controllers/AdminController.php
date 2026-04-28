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
        $users = User::with(['personalData', 'dailycalories', 'weightLogs'])->get();

        // Átszámoljuk az átlagokat minden felhasználónál
        foreach ($users as $user) {
            // Átlagos kalória és makrók a Dailycalorie táblából
            $user->avg_kcal = round($user->dailycalories->avg('totalCalories') ?? 0);
            $user->avg_pro = round($user->dailycalories->avg('totalProtein') ?? 0, 1);
            $user->avg_carb = round($user->dailycalories->avg('totalCarb') ?? 0, 1);
            $user->avg_fat = round($user->dailycalories->avg('totalFat') ?? 0, 1);

            // Aktuális súly (a legutolsó bejegyzés a weightlogs táblából)
            $user->current_weight = $user->weightLogs->sortByDesc('date')->first()->weight ?? ($user->personalData->weight ?? 'N/A');
        }

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

        // Visszajelzés az adminnak a művelet sikerességéről
        return back()->with('success', "{$user->name} fiókja és adatai sikeresen törölve");
    }

    
    
    
}
