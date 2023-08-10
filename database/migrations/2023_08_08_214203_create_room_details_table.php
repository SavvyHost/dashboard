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
        Schema::create('room_details', function (Blueprint $table) {
            $table->id();
            $table->double('net');
            $table->json('cancellation_policy');
            
            $table->unsignedBigInteger('room_id');
            $table->unsignedBigInteger('hotel_id');
            $table->unsignedBigInteger('supplier_id');

            $table->timestamps();
            
            $table->foreign('room_id')->on('rooms')->references('id')->onDelete('CASCADE');
            $table->foreign('hotel_id')->on('hotels')->references('id')->onDelete('CASCADE');
            $table->foreign('supplier_id')->on('suppliers')->references('id')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_details');
    }
};
