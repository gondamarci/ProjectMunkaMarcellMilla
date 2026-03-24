<?php

namespace App\Http\Controllers;

use App\Models\Personal_data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PersonalDataController extends Controller
{
    /* PROFIL SZERKESZTŐ OLDAL */
    public function edit()
    {

        $data = Auth::user()->personalData; 

        return view('pages.edit', compact('data'));
    }

    /* ADATOK MENTÉSE VAGY FRISSÍTÉSE */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'birthDate' => 'required|date',
            'gender'    => 'required|in:male,female',
            'height'    => 'required|numeric|min:50|max:250',
            'weight'    => 'required|numeric|min:20|max:500',
            'lifestyle' => 'required|numeric',
        ]);
    
        Auth::user()->personalData()->updateOrCreate(
            ['userId' => Auth::id()], 
            $validated                
        );

        return back()->with('success', '✅ Adataidat sikeresen mentettük!');
        
    }
}