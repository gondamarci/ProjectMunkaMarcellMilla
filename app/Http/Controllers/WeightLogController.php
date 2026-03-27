<?php

namespace App\Http\Controllers;

use App\Models\Weight_log;
use App\Http\Requests\StoreWeight_logRequest;
use App\Http\Requests\UpdateWeight_logRequest;
use Auth;
use Carbon\Carbon;

class WeightLogController extends Controller
{
    public static function currentWeight()
        {
            $user = Auth::user();
            if (!$user || !$user->personalData) return '0';

            $data = $user->personalData;
            
            // Tegnapi eredmény rögzítése, ha még nem történt meg 
            $today = now()->format('Y-m-d');
            $lastUpdate = $data->updated_at->format('Y-m-d');

            if ($lastUpdate < $today) {
                $yesterday = now()->subDay()->format('Y-m-d');
                $yesterdayIn = $user->foodLogs()->whereDate('date', $yesterday)->get()->sum(function($log) {
                    return ($log->food->calories / 100) * $log->quantity;
                });

                $kor = Carbon::parse($data->birthDate)->age;
                $bmr = (10 * $data->weight) + (6.25 * $data->height) - (5 * $kor);
                $bmr += ($data->gender === 'male' || $data->gender === 'férfi') ? 5 : -161;
                $tdeeTotal = $bmr * (float)$data->lifestyle;

                $yesterdayDiff = ($yesterdayIn - $tdeeTotal) / 7700;
                
                $data->weight = round($data->weight + $yesterdayDiff, 2);
                $data->save(); 
            }


            // AZNAPI MOZGÁS KÖVETÉSE 
            $caloriesIn = $user->Foodlog()->whereDate('date', now())->get()->sum(function($log) {
                return ($log->food->calories / 100) * $log->quantity;
            });

            // A mai TDEE-t a frissített súly alapján
            $kor = Carbon::parse($data->birthDate)->age;
            $bmrToday = (10 * $data->weight) + (6.25 * $data->height) - (5 * $kor);
            $bmrToday += ($data->gender === 'male' || $data->gender === 'férfi') ? 5 : -161;
            $tdeeToday = $bmrToday * (float)$data->lifestyle;

            // Időarányos égetés (mennyi égett el éjféltől mostanáig)
            $passedTimeFactor = now()->diffInMinutes(now()->startOfDay()) / 1440; 
            $burnedSoFar = $tdeeToday * $passedTimeFactor;

            $diff = ($caloriesIn - $burnedSoFar) / 7700;

            return round($data->weight + $diff, 2);
        }
}
