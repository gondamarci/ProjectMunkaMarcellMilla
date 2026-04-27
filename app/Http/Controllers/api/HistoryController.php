<?php

namespace App\Http\Controllers\api;


use App\Http\Controllers\Controller;
use App\Models\Foodlog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{

    public function history()
    {
        $user = Auth::user();
        $napiLimit = $this->calculateDailyLimit($user->personalData);

        // Lekérjük a felhasználó összes ételét és edzését
        $foods = Foodlog::where('userId', $user->id)->with('food')->get();
        $exercises = $user->exercises()->get();

        // Kigyűjtjük az összes egyedi dátumot, amikor történt valami, és csökkenő sorrendbe rakjuk
        $dates = $foods->pluck('date')
            ->merge($exercises->pluck('date'))
            ->unique()
            ->sortDesc();

        $history = [];

        // Végigmegyünk a dátumokon, és beletesszük a dobozba az aznapi dolgokat
        foreach ($dates as $date) {
            $history[] = [
                'date'      => $date,
                'foods'     => $foods->where('date', $date)->values(),
                'exercises' => $exercises->where('date', $date)->values(),
            ];
        }

        // Visszaadjuk a kész adatot
        return response()->json([
            'success'   => true,
            'napiLimit' => $napiLimit,
            'history'   => $history
        ]);
    }

    private function calculateDailyLimit($data)
    {
        if (!$data) return 2000;

        $kor = Carbon::parse($data->birthDate)->age;
        
        $bmr = (10 * $data->weight) + (6.25 * $data->height) - (5 * $kor);
        $bmr += ($data->gender === 'male') ? 5 : -161;

        return round($bmr * (float)$data->lifestyle);
    }
}
