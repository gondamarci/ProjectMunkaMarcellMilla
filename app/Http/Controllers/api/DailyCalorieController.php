<?php
namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\WeightLogController;
use App\Models\Exercise;
use App\Models\Food;
use App\Models\Foodlog;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DailyCalorieController extends Controller
{
    public function index()
    {
        // Felhasználó ellenőrzése
        $user = Auth::user();

        // Ha a felhasználónak van personalData adatai akkor továbbengedi, ha nincs visszadob egy üzenetet
        $data = $user->personalData;
        if(!$data){
            return response()->json([
                'message' => "Kérlek, add meg az adataidat a weblapon"
            ], 404);
        }

        // Aktuális súly lekérése
        $currentWeight = WeightLogController::currentWeight();

        // Mai napon elfogyasztott kalóriák összeadása. (A sum után a function($log) bírálja el hogyan adjuk össze a táblázatot. A $log az bármi lehet csak változónév )
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

        // Maradék kalória kiszámítása
        $remaining = $tdeeTotal - $caloriesIn;

        // Adatok visszaküldése JSON formátumban
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

    // Étel naplózása
    public function storeFoodLog(Request $request)
    {
        $validated = $request->validate([
            'food_id' => 'required|exists:food,id',
            'amount' => 'required|numeric|min:1',
        ]);

        // Étel hozzáadása
        $log = Foodlog::create([
            'userId' => Auth::id(),
            'foodId' => $validated['food_id'],
            'quantity' => $validated['amount'],
            'date' => Carbon::today(),
        ]);

        // Adatok visszaküldése
        return response()->json([
            'success' => true,
            'message' => 'Étel rögzítve!',
            'data'    => $log
        ], 201);
    }

    // Gyors étel hozzáadása
    public function quickStore(Request $request)
    {
        $request->validate([
            'quick_name' => 'required|string|max:255',
            'quick_kcal' => 'required|numeric|min:1',
        ]);

        // Hozzáadása az adatbázishoz
        $newFood = Food::create([
            'foodname' => $request->quick_name , ' (Gyors)',
            'calories' => 100,
            'protein'  => 0, 'carb' => 0, 'fat' => 0, 'fiber' => 0,
        ]);

        // Naplóba írás
        $log = Foodlog::create([
            'userId'   => Auth::id(),
            'foodId'   => $newFood->id,
            'quantity' => $request->quick_kcal, 
            'date'     => Carbon::today(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Gyors étel rögzítve!',
            'food' => $newFood,
            'log' => $log
        ], 201);
    }


    // Edzés hozzáadása
    public function storeExercise(Request $request)
    {
        $request->validate([
            'exercise_type' => 'required|string',
            'duration'      => 'required|numeric|min:1',
        ]);

        $factors = [
            'walk'         => 4,  
            'run'          => 10, 
            'gym'      => 6,
            'swim'         => 8,  
            'bike'         => 7,  
            'yoga'     => 3,
            'aerobics'     => 7,  
            'hiit'         => 12, 
            'dance'    => 5,
            'football'     => 8,  
            'basketball'   => 8,  
            'tennis'   => 7,
            'hiking'       => 6,  
            'stairs'       => 9,  
            'pilates'  => 4,
            'crossfit'     => 11, 
            'martial_arts' => 10, 
        ];

        // Ha van ilyen type akkor annak a kcal, ha nincs alapértelmezett 5
        $kcalPerMinute = $factors[$request->exercise_type] ?? 5;

        $exercise = Exercise::create([
            'user_id'       => Auth::id(),
            'exercise_type' => $request->exercise_type,
            'duration'      => $request->duration,
            'kcal_burned'   => $request->duration * $kcalPerMinute,
            'date'          => Carbon::today(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Edzés elmentve!',
            'data'    => $exercise
        ], 201);
    }

    // Étel törlése
    public function destroyFoodLog($id)
    {
        // Megkeresi azt a Foodlog id-t ahol a userId egyezik a bejelentkezett felhasználó id-jával
        $log = Foodlog::where('userId', Auth::id())->find($id);

        if (!$log) {
            return response()->json([
                'success' => false,
                'message' => 'Étel nem található, vagy nincs jogosultságod törölni.'
            ], 404);
        }

        $log->delete();

        return response()->json([
            'success' => true,
            'message' => 'Étel törölve!'
        ], 200);
    }

    // 5. Edzés törlése
    public function destroyExercise($id)
    {
        // Megkeresi azt a Foodlog id-t ahol a userId egyezik a bejelentkezett felhasználó id-jával
        $exercise = Exercise::where('user_id', Auth::id())->find($id);

        if (!$exercise) {
            return response()->json([
                'success' => false,
                'message' => 'Edzés nem található, vagy nincs jogosultságod törölni.'
            ], 404);
        }

        $exercise->delete();

        return response()->json([
            'success' => true,
            'message' => 'Edzés törölve!'
        ], 200);
    }
}