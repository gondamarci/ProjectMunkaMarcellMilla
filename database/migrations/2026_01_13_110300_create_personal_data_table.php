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
        Schema::create('personal_data', function (Blueprint $table) {

            $table->foreignId('userId')->constrained('users')->onDelete('cascade');
            $table->id();
            $table -> date("birthDate")->nullable();
            $table -> string("gender")->nullable();
            $table -> float("height")->nullable();
            $table -> decimal("weight")->nullable();
            $table -> string("lifestyle")->nullable();    
            $table -> double("goalWeight")->nullable();
            $table -> softDeletes();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_data');
    }
};
