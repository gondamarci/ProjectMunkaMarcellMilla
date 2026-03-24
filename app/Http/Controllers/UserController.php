<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PersonalData;

class UserController extends Controller
{
    /* Oldal megjelenítése (GET) */
    public function edit()
    {
        $user = Auth::user();
        $data = $user->personalData; 

        return view('pages.edit', compact('data'));
    }

    /* Adatok mentése a personal_data táblába (POST) */
    public function update(Request $request)
    {
        $request->validate([
            'birthDate' => 'required|date',
            'gender'    => 'required|in:male,female',
            'height'    => 'required|numeric|min:50|max:250',
            'weight'    => 'required|numeric|min:20|max:500',
            'lifestyle' => 'required|numeric',
        ]);

        $user = Auth::user();

        PersonalData::updateOrCreate(
            ['userId' => Auth::id()], 
            [
                'userId'    => Auth::id(), 
                'birthDate' => $request->birthDate,
                'gender'    => $request->gender,
                'height'    => $request->height,
                'weight'    => $request->weight,
                'lifestyle' => $request->lifestyle,
            ]
        );

        return redirect()->back()->with('success', 'Adataidat sikeresen mentettük!');
    }
}