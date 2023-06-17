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
            $table->unsignedBigInteger('hotel_id');
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

            // Foreign key constraint
            $table->foreign('hotel_id')->references('id')->on('hotels');

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
