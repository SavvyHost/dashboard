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
        Schema::create('tours', function (Blueprint $table) {
            $table->integer('id', true);
            $table->text('title');
            $table->integer('category_id');
            $table->text('duration');
            $table->integer('min_people');
            $table->integer('max_people');
            $table->text('location')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->decimal('price', 10);
            $table->text('banner')->nullable();
            $table->text('images')->nullable()->default('\'\' \'\'');
            $table->text('terms')->default('\'\' \'\'');
            $table->text('description');
            $table->unsignedBigInteger('type')->nullable();
            $table->decimal('sale_price', 10)->nullable();
            $table->text('tour_date');
            $table->text('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tours');
    }
};
