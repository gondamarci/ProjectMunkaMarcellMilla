<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Food extends Model
{
    /** @use HasFactory<\Database\Factories\FoodFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'foodname',
        'calories',
        'protein',
        'carb',
        'fat',
        'fiber',
    ];

     public function Foodlog(){
        return $this->hasMany(Foodlog::class, 'foodId');
    }

}
