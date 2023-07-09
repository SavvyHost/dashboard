<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->integer('hotel_id', 255);
            $table->string('name');
            $table->decimal('price', 8, 2);
            $table->integer('max_adult');
            $table->integer('max_child');
            $table->date('creation_date');
            $table->text('images')->nullable();
            $table->string('banner')->nullable();
            $table->text('description')->nullable();
            $table->text('terms')->nullable();
            $table->string('type')->nullable();
            $table->string('meal_type')->nullable();
            $table->decimal('meal_Price',8,2)->nullable();

            // Foreign key constraint
            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');

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
}
