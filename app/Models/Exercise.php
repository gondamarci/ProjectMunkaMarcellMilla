<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $fillable = [
        'user_id',
        'exercise_type',
        'duration',
        'kcal_burned',
        'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
