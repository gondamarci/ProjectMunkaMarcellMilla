<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dailycalories', function (Blueprint $table) {
            $table->id();
            $table -> foreignId('userId')->constrained('users')->onDelete('cascade');
            $table -> date("date");
            $table -> decimal("totalCalories", 10, 2);
            $table -> decimal("totalProtein", 10, 2);
            $table -> decimal("totalCarb", 10, 2);
            $table -> decimal("totalFat", 10, 2);
            $table -> softDeletes('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dailycalories');
    }
};
