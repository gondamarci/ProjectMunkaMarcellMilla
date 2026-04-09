<?php
namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\WeightLogController;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DailyCalorieController extends Controller
{
    public function index()
    {
        //Felhasználó ellenőrzése
        $user = Auth::user();

        //Ha a felhasználónak van personalData adatai akkor továbbengedi, ha nincs visszadob egy üzenetet
        $data = $user->personalData;
        if(!$data){
            return response()->json([
                'message' => "Kérlek, add meg az adataidat a weblapon"
            ], 404);
        }

        // Aktuális súly lekérése
        $currentWeight = WeightLogController::currentWeight();

        //Mai napon elfogyasztott kalóriák összeadása. (A sum után a function($log) bírálja el hogyan adjuk össze a táblázatot. A $log az bármi lehet csak változónév )
        $caloriesIn = $user->FoodLog()->whereDate('date', now())->get()->sum(function($log){
            return ($log->food->calories / 100) * $log->quantity;
        });

        // Felhasználó korának kiszámítása
        $kor = Carbon::parse($data->birthDate)->age;

        //Alapanyagcsere kiszámítása (BMR), majd felhasználóhoz igazítás
        $bmr = (10 *  $data->weight) + (6.25 * $data->height) - (5 * $kor);
        $bmr += ($data->gender === 'male') ? 5 : -161;

        // Napi kalóriakeret meghatározása
        $tdeeTotal = round($bmr * (float)$data->lifestyle);

        //Maradék kalória kiszámítása
        $remaining = $tdeeTotal - $caloriesIn;

        // Adatok visszaküldése JSON formátumban a MAUI appnak
        return response()->json([
            'status' => 'success',
            'data' => [
                'username' => $user->username,
                'currentWeight' => $currentWeight,
                'caloreisIn' => round($caloriesIn),
                'tdeeLimit' => $tdeeTotal,
                'remaining' => round($remaining),
                'date' => now()->format('Y-m-d')
            ]
        ], 200);
    }
}