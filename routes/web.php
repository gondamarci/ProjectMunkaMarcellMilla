<?php

use App\Http\Controllers\AdminController;
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

    // Profil kezelés 
    Route::prefix('profile')->name('profile.')->group(function () {
        // Profil szerkesztése és adatmentés
        Route::get('/', [PersonalDataController::class, 'edit'])->name('edit'); 
        // Adatok mentése vagy frissítése
        Route::post('/', [PersonalDataController::class, 'update'])->name('update'); 
    });

    // Étel adatbázis
    Route::prefix('food-database')->name('food.')->group(function () {
        // Ételek listázása ABC sorrendben
        Route::get('/', [FoodController::class, 'index'])->name('index');
        // Új étel rögzítése az adatbázisba
        Route::post('/', [FoodController::class, 'store'])->name('store');
        // Meglévő étel frissítése
        Route::put('/{id}', [FoodController::class, 'update'])->name('update');
        // Étel törlése
        Route::delete('/{id}', [FoodController::class, 'destroy'])->name('destroy');
    });

    // Kalória és napló kezeléss
    Route::controller(DailyCalorieController::class)->group(function () {
        // Kalória főoldal és napló előzmények
        Route::get('/calories', 'index')->name('calories.index');
        // Napló előzmények
        Route::get('/history', 'history')->name('calories.history');

        // Ételek naplózása
        Route::prefix('daily-calorie')->name('food.log.')->group(function () {
            // Ételek naplózása
            Route::post('/food-log', 'storeFoodLog')->name('store');
            // Gyors naplózás 
            Route::post('/quick', 'quickStore')->name('quick');
            // Naplózott étel törlése
            Route::delete('/{id}', 'destroyFoodLog')->name('destroy');
        });

        // Edzések naplózása
        Route::post('/exercise/store', 'storeExercise')->name('exercise.store');
        // Naplózott edzés törlése
        Route::delete('/daily-calorie/exercise/{id}', 'destroyExercise')->name('exercise.destroy');
    });

});

/*
|--------------------------------------------------------------------------
| Admin útvonalak
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->group(function () {
    // Étel törlése és szerkesztése
    Route::delete('/food-database/{id}', [FoodController::class, 'destroy'])->name('food.destroy');
    // Userek listázása, szerkesztése, törlése (ha szükséges)
    Route::get('/admin/users', [AdminController::class, 'userStats'])->name('admin.users');
    //Felhasználó törlése 
    Route::delete('admin/users/{user}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');
});