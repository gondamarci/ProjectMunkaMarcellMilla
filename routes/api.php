<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\DailyCalorieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Bejelentkezés
Route::post('/login', [AuthController::class, 'login']);

// Hitelesített felhasználóknak
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/dailyStats', [DailyCalorieController::class, 'index']);
});