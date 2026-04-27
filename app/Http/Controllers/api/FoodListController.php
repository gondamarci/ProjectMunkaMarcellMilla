<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Food;
use Auth;
use Illuminate\Http\Request;

class FoodListController extends Controller
{
    public function index()
    {
        // Ételek lekérése név szerint növekvő sorrendben
        $foods = Food::orderBy('foodname', 'asc')->get();
        
        return response()->json([
            'success' => true,
            'foods'   => $foods
        ], 200);
    }

    // Étel hozzáadása az adatbázishoz
    public function store(Request $request)
    {
        $validated = $this->validateFood($request);

        $food = Food::create($validated);
        
        return response()->json([
            'success' => true,
            'message' => 'Étel sikeresen hozzáadva az adatbázishoz!',
            'food'    => $food
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $validated = $this->validateFood($request);

        $food = Food::find($id);

        if (!Auth::user()->is_admin) {
            return response()->json([
                'success' => false,
                'message' => 'Nincs jogosultságod módosítani ezt az ételt!'
            ], 403);
        }

        if (!$food) {
            return response()->json([
                'success' => false,
                'message' => 'A keresett étel nem található!'
            ], 404);
        }

        $food->update($validated);
        
        return response()->json([
            'success' => true,
            'message' => 'Étel sikeresen frissítve!',
            'food'    => $food
        ], 200);
    }

    public function destroy($id)
    {
        // Ellenőrizzük, hogy a felhasználó admin-e
        if (!Auth::user()->is_admin) {
            return response()->json([
                'success' => false,
                'message' => 'Nincs jogosultságod törölni ezt az ételt!'
            ], 403);
        }

        $food = Food::find($id);

        if (!$food) {
            return response()->json([
                'success' => false,
                'message' => 'A keresett étel nem található!'
            ], 404);
        }

        $food->delete(); 
        
        return response()->json([
            'success' => true,
            'message' => 'Étel törölve!'
        ], 200);
    }


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
