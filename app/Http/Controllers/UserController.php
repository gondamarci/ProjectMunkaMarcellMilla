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

    
}