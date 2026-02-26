<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weightlog extends Model
{
    /** @use HasFactory<\Database\Factories\WeightLogFactory> */
    use HasFactory;

    public function User(){
        return $this->belongsTo(User::class, 'userId');
    }
}
