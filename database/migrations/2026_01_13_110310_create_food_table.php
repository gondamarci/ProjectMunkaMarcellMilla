<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('food', function (Blueprint $table) { // fontos: 'foods', nem 'food'
            $table->id();
            $table->string('foodname');
            $table->decimal('calories', 10, 2);
            $table->decimal('protein', 10, 2);
            $table->decimal('carb', 10, 2);
            $table->decimal('fat', 10, 2);
            $table->decimal('fiber', 10, 2);
            $table->softDeletes(); 
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('foods');
    }
};
