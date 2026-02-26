<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dailycalorie extends Model
{
    /** @use HasFactory<\Database\Factories\DailyCalorieFactory> */
    use HasFactory;

    public function User(){
        return $this->belongsTo(User::class, 'userId');
    }
}
