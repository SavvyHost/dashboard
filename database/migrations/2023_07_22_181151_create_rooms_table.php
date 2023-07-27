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
        Schema::create('rooms', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('hotel_id')->index('hotel_id');
            $table->string('name');
            $table->decimal('price');
            $table->integer('currency');
            $table->integer('max_adult');
            $table->integer('max_child');
            $table->date('creation_date');
            $table->text('images')->nullable();
            $table->string('banner')->nullable();
            $table->text('description')->nullable();
            $table->text('terms')->default('\'\' \'\'');
            $table->text('sups')->nullable()->default('\'\'\\\\\'\' \\\\\'\'\'\'');
            $table->unsignedBigInteger('type')->nullable()->index('type');
            $table->boolean('has_meal')->nullable();
            $table->boolean('free_meal')->nullable();
            $table->text('meal_type')->nullable()->default('\'\'\\\\\'\' \\\\\'\'\'\'');
            $table->decimal('meal_price')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
};
