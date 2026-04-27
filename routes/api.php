<?php

use App\Http\Controllers\api\ApiAdminController;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\DailyCalorieController;
use App\Http\Controllers\api\FoodListController;
use App\Http\Controllers\api\HistoryController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Bejelentkezés
Route::post('/login', [AuthController::class, 'login']);

// Hitelesített felhasználóknak
Route::middleware('auth:sanctum')->group(function () {
    // Kijelentkezés
    Route::post('/logout', [AuthController::class, 'logout']);

    // Napló
    Route::get('/dailyStats', [DailyCalorieController::class, 'index']);

    // Ételek naplózása
    Route::post('/food-log', [DailyCalorieController::class, 'storeFoodLog']);
    Route::post('/food-log/quick', [DailyCalorieController::class, 'quickStore']);
    Route::delete('/food-log/{id}', [DailyCalorieController::class, 'destroyFoodLog']);

    // Edzések naplózása
    Route::post('/exercise', [DailyCalorieController::class, 'storeExercise']);
    Route::delete('/exercise/{id}', [DailyCalorieController::class, 'destroyExercise']);

    // Előzmények
    Route::get('/history', [HistoryController::class, 'history']);

    // Étel Adatbázis
    Route::get('/foods', [FoodListController::class, 'index']);           
    Route::post('/foods', [FoodListController::class, 'store']);          
    Route::put('/foods/{id}', [FoodListController::class, 'update']);     
    Route::delete('/foods/{id}', [FoodListController::class, 'destroy']); 

    // Admin műveletek
    Route::get('/admin/users', [ApiAdminController::class, 'userStats']);
    Route::delete('/admin/users/{id}', [ApiAdminController::class, 'destroyUser']);
});