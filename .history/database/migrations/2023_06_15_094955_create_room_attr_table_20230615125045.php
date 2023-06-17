<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomAttrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_attr', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // Add any other columns you need

            // Add foreign key constraints if necessary
            // For example, if you have a foreign key relation with another table:
            // $table->foreign('another_table_id')->references('id')->on('another_table')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room_attr');
    }
}
