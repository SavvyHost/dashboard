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
        Schema::create('room_terms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('attr_id')->index('room_terms_attr_id_foreign');
            $table->string('name');
            $table->decimal('price');
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
};
