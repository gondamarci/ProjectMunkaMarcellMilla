<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FoodController extends Controller
{
    /**
     * Ételek listázása ABC sorrendben
     */
    public function index()
    {
        $foods = Food::orderBy('foodname', 'asc')->get();
        return view('pages.food_list', compact('foods'));
    }

    /**
     * Új étel rögzítése az adatbázisba
     */
    public function store(Request $request)
    {
        $validated = $this->validateFood($request);

        Food::create($validated);
        return redirect()->back()->with('success', '✅ Étel sikeresen hozzáadva az adatbázishoz!');
    }

    /**
     * Meglévő étel frissítése
     */
    public function update(Request $request, $id)
    {
        $validated = $this->validateFood($request);

        $food = Food::findOrFail($id);
        $food->update($validated);
        return redirect()->back()->with('success', '🔄 Étel sikeresen frissítve!');
    }

    /**
     * Étel törlése
     */
    public function destroy($id)
    {
        $food = Food::findOrFail($id);
        $food->delete(); // Soft delete-et használ, ha a modellben be van állítva
        return redirect()->back()->with('success', '🗑️ Étel törölve!');
    }

    /**
     * SEGÉDFÜGGVÉNY: Étel adatok validálása
     * Ezt hívja meg a store és az update is, így nem kell kétszer leírni ugyanazt.
     */
    private function validateFood(Request $request)
    {
        return $request->validate([
            'foodname' => 'required|string|max:255',
            'calories' => 'required|numeric|min:0',
            'protein'  => 'required|numeric|min:0',
            'carb'     => 'required|numeric|min:0',
            'fat'      => 'required|numeric|min:0',
            'fiber'    => 'required|numeric|min:0',
        ]);
    }
}