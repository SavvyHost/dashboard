<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealRoomTable extends Migration
{
    public function up()
    {
        Schema::create('meal_room', function (Blueprint $table) {
            $table->unsignedBigInteger('room_id');
            $table->unsignedBigInteger('meal_id');
            // Add any additional columns if needed

            // $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
            // $table->foreign('meal_id')->references('id')->on('meals')->onDelete('cascade');

            // $table->primary(['room_id', 'meal_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('meal_room');
    }
}
