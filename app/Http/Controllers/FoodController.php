<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FoodController extends Controller
{
    
    //Ételek listázása ABC sorrendben
    
    public function index()
    {
        $foods = Food::orderBy('foodname', 'asc')->get();
        return view('pages.food_list', compact('foods'));
    }

    
    //Új étel rögzítése az adatbázisba
    
    public function store(Request $request)
    {
        $validated = $this->validateFood($request);

        Food::create($validated);
        return redirect()->back()->with('success', '✅ Étel sikeresen hozzáadva az adatbázishoz!');
    }

    
    //Meglévő étel frissítése
    public function update(Request $request, $id)
    {
        $validated = $this->validateFood($request);

        $food = Food::findOrFail($id);
        $food->update($validated);
        return redirect()->back()->with('success', '🔄 Étel sikeresen frissítve!');
    }

    //Étel törlése
    public function destroy($id)
    {
        // Ellenőrizzük, hogy a felhasználó admin-e
        if( !auth()->user()->is_admin) {
            return redirect()->back()->with(403, '❌ Nincs jogosultságod törölni ezt az ételt!');
        }

        // Töröljük az ételt, ha admin
        $food = Food::findOrFail($id);
        $food->delete(); 
        return redirect()->back()->with('success', '🗑️ Étel törölve!');
    }

    
    //segédfüggvény: Étel adatok validálása
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