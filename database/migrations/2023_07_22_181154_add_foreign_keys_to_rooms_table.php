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
        Schema::table('rooms', function (Blueprint $table) {
            $table->foreign(['type'], 'rooms_ibfk_2')->references(['id'])->on('room_types');
            $table->foreign(['hotel_id'], 'rooms_ibfk_1')->references(['id'])->on('hotels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->dropForeign('rooms_ibfk_2');
            $table->dropForeign('rooms_ibfk_1');
        });
    }
};
