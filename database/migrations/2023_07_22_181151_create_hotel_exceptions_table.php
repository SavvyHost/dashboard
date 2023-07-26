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
        Schema::create('hotel_exceptions', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('hotel_id')->index('hotel_id');
            $table->text('hotel_name')->nullable();
            $table->text('location');
            $table->text('start_date');
            $table->text('end_date');
            $table->decimal('new_price', 10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotel_exceptions');
    }
};
