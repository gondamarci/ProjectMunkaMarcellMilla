<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foodlog extends Model
{
    /** @use HasFactory<\Database\Factories\FoodLogFactory> */
    use HasFactory;

    protected $fillable = [
        'userId',
        'foodId',
        'quantity',
        'date',
    ];
    

    public function User(){
        return $this->belongsTo(User::class, 'userId');
    }

    public function food(){
        return $this->belongsTo(Food::class, 'foodId');
    }
}
