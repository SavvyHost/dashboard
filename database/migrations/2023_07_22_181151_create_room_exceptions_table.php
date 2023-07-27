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
        Schema::create('room_exceptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('hotel_id')->index('room_exceptions_hotel_id_foreign');
            $table->integer('room_id')->index('room_exceptions_room_id_foreign');
            $table->string('hotel_name');
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('new_price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room_exceptions');
    }
};
