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
        Schema::create('room_detail_meal', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('room_detail_id');
            $table->unsignedBigInteger('meal_id');
            $table->timestamps();
    
            $table->foreign('room_detail_id')->on('room_details')->references('id')->onDelete('CASCADE');
            $table->foreign('meal_id')->on('meals')->references('id')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_detail_meal');
    }
};
