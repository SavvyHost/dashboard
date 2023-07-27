<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('meal_room', function (Blueprint $table) {
            $table->foreign(['room_id'], 'meal_room_ibfk_2')->references(['id'])->on('rooms');
            $table->foreign(['meal_id'], 'meal_room_ibfk_1')->references(['id'])->on('meals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('meal_room', function (Blueprint $table) {
            $table->dropForeign('meal_room_ibfk_2');
            $table->dropForeign('meal_room_ibfk_1');
        });
    }
};
