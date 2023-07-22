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
        Schema::table('room_exceptions', function (Blueprint $table) {
            $table->foreign(['room_id'])->references(['id'])->on('rooms')->onDelete('CASCADE');
            $table->foreign(['hotel_id'])->references(['id'])->on('hotels')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('room_exceptions', function (Blueprint $table) {
            $table->dropForeign('room_exceptions_room_id_foreign');
            $table->dropForeign('room_exceptions_hotel_id_foreign');
        });
    }
};
