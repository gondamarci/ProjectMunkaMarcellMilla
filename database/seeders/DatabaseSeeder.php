<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\FoodLog;
use App\Models\Food;
use App\Models\WeightLog;
use App\Models\PersonalData;
use App\Models\DailyCalorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory(10)->create();     
        Food::factory(20)->create();      

        FoodLog::factory(10)->create();
        WeightLog::factory(10)->create();
        PersonalData::factory(10)->create();
        DailyCalorie::factory(10)->create();
    
        
        
    }
}
