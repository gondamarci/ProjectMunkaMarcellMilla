<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Personaldata extends Model
{
    /** @use HasFactory<\Database\Factories\PersonalDataFactory> */
    use HasFactory, SoftDeletes; 

    protected $table = 'personaldatas';

    protected $fillable = [
    'userId', 
    'height',
    'weight',
    'lifestyle',
    'birthDate',
    'gender',
    'goalWeight'
];

    public function User(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
