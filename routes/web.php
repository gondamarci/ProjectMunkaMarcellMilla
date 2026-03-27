<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DailyCalorieController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\PersonalDataController; // <-- EZT CSERÉLTÜK (UserController helyett)
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Publikus útvonalak
|--------------------------------------------------------------------------
*/
Route::view('/', 'pages.welcome');

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', fn() => view('Auth.login'))->name('login');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->name('logout');

    Route::get('/register', fn() => view('Auth.register'))->name('register');
    Route::post('/register', 'register');
});

/*
|--------------------------------------------------------------------------
| Autentikációt igénylő útvonalak
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // Profil kezelés - Most már a PersonalDataController-t használja
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [PersonalDataController::class, 'edit'])->name('edit'); // <-- ÁTÍRVA
        Route::post('/', [PersonalDataController::class, 'update'])->name('update'); // <-- ÁTÍRVA
    });

    // Étel adatbázis
    Route::prefix('food-database')->name('food.')->group(function () {
        Route::get('/', [FoodController::class, 'index'])->name('index');
        Route::post('/', [FoodController::class, 'store'])->name('store');
        Route::put('/{id}', [FoodController::class, 'update'])->name('update');
        Route::delete('/{id}', [FoodController::class, 'destroy'])->name('destroy');
    });

    // Kalória és Napló kezelésS
    Route::controller(DailyCalorieController::class)->group(function () {
        Route::get('/calories', 'index')->name('calories.index');
        Route::get('/history', 'history')->name('calories.history');

        Route::prefix('daily-calorie')->name('food.log.')->group(function () {
            Route::post('/food-log', 'storeFoodLog')->name('store');
            Route::post('/quick', 'quickStore')->name('quick');
            Route::delete('/food/{id}', 'destroyFoodLog')->name('destroy');
        });

        Route::post('/exercise/store', 'storeExercise')->name('exercise.store');
        Route::delete('/daily-calorie/exercise/{id}', 'destroyExercise')->name('exercise.destroy');
    });

});