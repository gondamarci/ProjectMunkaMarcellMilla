<?php

namespace App\Http\Controllers;

use App\Models\{Daily_calorie, Dailycalorie, Exercise, Food, Foodlog, User};
use App\Http\Requests\{StoreDaily_calorieRequest, UpdateDaily_calorieRequest};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DailyCalorieController extends Controller
{
    
    public function index()
    {

        // Hitelesítés ellenőrzése
        $user = Auth::user();
        $data = $user->personalData;
        $today = Carbon::today()->toDateString();

        // Ha nincs kitöltve a személyes adat, akkor átirányítjuk a profil szerkesztő oldalra
        if (!$data) {
            return redirect()->route('profile.edit');
        }

        // Edzések lekérése
        $eledzett = $user->exercises()->where('date', $today)->sum('kcal_burned');

        //Mai étkezések lekérése
        $consumedToday = Foodlog::where('userId', $user->id)
            ->where('date', $today)
            ->with('food')
            ->get();

        // Tápanyagok összesítése
        $totals = $consumedToday->reduce(function ($carry, $log) {
            // Ha létezik az étel akkor számol
            if ($log->food) {
                $ratio = $log->quantity / 100;
                $carry['kcal'] += $log->food->calories * $ratio;
                $carry['protein'] += $log->food->protein * $ratio;
                $carry['carb'] += $log->food->carb * $ratio;
                $carry['fat'] += $log->food->fat * $ratio;
                $carry['fiber'] += $log->food->fiber * $ratio;
            }
            return $carry;
        }, ['kcal' => 0, 'protein' => 0, 'carb' => 0, 'fat' => 0, 'fiber' => 0 ]);

        // BMR és limit kiszámítása (kiszervezett metódus)
        $napiLimit = $this->calculateDailyLimit($data);
        $kor = Carbon::parse($data->birthDate)->age;

        return view('pages.DailyCalories', [
            'data'             => $data,
            'napiLimit'        => $napiLimit,
            'kor'              => $kor,
            'eledzett'         => $eledzett,
            'elfogyasztott'    => $totals['kcal'],
            'osszFeherje'      => $totals['protein'],
            'osszSzenhidrat'   => $totals['carb'],
            'osszZsir'         => $totals['fat'],
            'osszRost'         => $totals['fiber'],
            'foods'            => Food::all(),
            'consumedToday'    => $consumedToday
        ]);
    }

    //Étel naplózása
    public function storeFoodLog(Request $request)
    {
        // Validálás
        $validated = $request->validate([
            'food_id' => 'required|exists:food,id',
            'amount'  => 'required|numeric|min:1',
        ]);

        //Étel létrehozása
        Foodlog::create([
            'userId'   => Auth::id(),
            'foodId'   => $validated['food_id'], 
            'quantity' => $validated['amount'], 
            'date'     => Carbon::today(),
        ]);

        $this->updateDailySummary(Auth::id(), Carbon::today());

        return back()->with('success', 'Étel rögzítve!');
    }

    
    // Gyors étel rögzítése (nem létező ételhez)
    public function quickStore(Request $request)
    {
        $request->validate([
            'quick_name' => 'required|string|max:255',
            'quick_kcal' => 'required|numeric|min:1',
        ]);

        // Létrehozzuk az élelmiszert
        $newFood = Food::create([
            'foodname' => $request->quick_name . ' (Gyors)',
            'calories' => 100, 
            'protein'  => 0, 'carb' => 0, 'fat' => 0, 'fiber' => 0
        ]);

        // Beírjuk a naplóba a megadott kalóriát mennyiségként
        Foodlog::create([
            'userId'   => Auth::id(),
            'foodId'   => $newFood->id,
            'quantity' => $request->quick_kcal, 
            'date'     => Carbon::today(),
        ]);

        $this->updateDailySummary(Auth::id(), Carbon::today());

        return back()->with('success', 'Gyors étel rögzítve!');
    }

    //Edzés rögzítése
     
    public function storeExercise(Request $request)
    {
        $request->validate([
        'exercise_type' => 'required|string',
        'duration'      => 'required|numeric|min:1',
        ]);

        // Edzés típusok
        $factors = [
            'walk'         => 4,
            'run'          => 10, 
            'gym'          => 6,
            'swim'         => 8,
            'bike'         => 7, 
            'yoga'         => 3,
            'aerobics'     => 7,
            'hiit'         => 12, 
            'dance'        => 5,
            'football'     => 8,
            'basketball'   => 8,
            'tennis'       => 7,
            'hiking'       => 6,
            'stairs'       => 9,
            'pilates'      => 4,
            'crossfit'     => 11, 
            'martial_arts' => 10, 
        ];

        // Ha véletlenül olyan jönne be, ami nincs a listán, az alapértelmezett 5 kcal/perc
        $kcalPerMinute = $factors[$request->exercise_type] ?? 5;

        Exercise::create([
            'user_id'       => Auth::id(),
            'exercise_type' => $request->exercise_type,
            'duration'      => $request->duration,
            'kcal_burned'   => $request->duration * $kcalPerMinute,
            'date'          => Carbon::today(),
        ]);

        return back()->with('success', 'Edzés elmentve!');
    }

    
    //Előzmények megjelenítése
    public function history()
    {
        // Hitelesítés ellenőrzése
        $user = Auth::user();
        $napiLimit = $this->calculateDailyLimit($user->personalData);

        // Felhasználó összes ételének és edzésének lekérése, majd dátum szerint csoportosítva
        $groupedExercises = $user->exercises()->latest('date')->get()->groupBy('date');
        $groupedFoods = Foodlog::where('userId', $user->id)
            ->with('food')
            ->latest('date')
            ->get()
            ->groupBy('date');

        // Minden egyedi dátum kigyűjtése, amikor történt valami, és csökkenő sorrendbe rakása
        $allDates = $groupedExercises->keys()
            ->merge($groupedFoods->keys())
            ->unique()
            ->sortDesc();

        // Visszaadjuk a nézetet a szükséges adatokkal
        return view('pages.History', compact('allDates', 'groupedExercises', 'groupedFoods', 'napiLimit'));
    }

    
    //Étel törlése
    public function destroyFoodLog($id)
    {
        // Megkeressük a bejegyzést
        $log = Foodlog::where('userId', Auth::id())->find($id);

        // Ha nincs meg a bejegyzés, visszatérünk egy hibaüzenettel
        if (!$log) {
            return back()->with('error', 'Az étel nem található.');
        }

        // Elmentjük a userId-t és a dátumot, hogy utána frissíteni tudjuk a napi összesítőt
        $userId = $log->userId;
        $date = $log->date;

        // Töröljük a bejegyzést
        $log->delete();

        // Frissítjük a napi összesítőt a törlés után
        $this->updateDailySummary($userId, $date);

        return back()->with('success', 'Étel törölve és statisztika frissítve!');
    }

    //Edzés törlése
    public function destroyExercise($id)
    {
        // Megkeressük azt a Exercise bejegyzést, ahol a user_id egyezik a bejelentkezett felhasználó id-jával, és az id is megegyezik
        Exercise::where('user_id', Auth::id())->findOrFail($id)->delete();
        return back()->with('success', 'Edzés törölve!');
    }

    
    //segédfüggvény: BMR és Napi limit kiszámítása
    
    private function calculateDailyLimit($data)
    {
        // Ha nincs meg a személyes adat, akkor visszaadunk egy alapértéket (pl. 2000 kcal)
        if (!$data) return 2000; 

        // Kor kiszámítása a születési dátumból
        $kor = Carbon::parse($data->birthDate)->age;
        
        // BMR kiszámítása a Mifflin-St Jeor képlettel, majd életmód faktorral szorozva
        $bmr = (10 * $data->weight) + (6.25 * $data->height) - (5 * $kor);
        $bmr += ($data->gender === 'male') ? 5 : -161;

        return round($bmr * (float)$data->lifestyle);
    }

    private function updateDailySummary($userId, $date)
    {
        $user = User::find($userId);

        // Összesítjük az aznapi tápanyagokat a foodlog-ból
        $summary = $user->FoodLog()->whereDate('date', $date)->get()->reduce(function($carry, $log) {
            if ($log->food) {
                $ratio = $log->quantity / 100;
                $carry['kcal'] += $log->food->calories * $ratio;
                $carry['pro'] += $log->food->protein * $ratio;
                $carry['carb'] += $log->food->carb * $ratio;
                $carry['fat'] += $log->food->fat * $ratio;
            }
            return $carry;
        }, ['kcal' => 0, 'pro' => 0, 'carb' => 0, 'fat' => 0]);

        // Mentés vagy frissítés a dailycalories táblában
        Dailycalorie::updateOrCreate(
            ['userId' => $userId, 'date' => $date],
            [
                'totalCalories' => round($summary['kcal']),
                'totalProtein' => round($summary['pro'], 1),
                'totalCarb' => round($summary['carb'], 1),
                'totalFat' => round($summary['fat'], 1),
            ]
        );
    }
}