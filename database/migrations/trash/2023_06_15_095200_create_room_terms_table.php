<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_terms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('attr_id');
            $table->string('name');
            // Add any other columns you need

            $table->foreign('attr_id')->references('id')->on('room_attr')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room_terms');
    }
}
