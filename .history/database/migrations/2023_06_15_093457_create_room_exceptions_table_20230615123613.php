<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomExceptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_exceptions', function (Blueprint $table) {
            $table->id();
            $table->integer('hotel_id', 255);
            $table->integer('room_id', 255);
            $table->string('hotel_name');
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('new_price', 8, 2);
            // Add any other columns you need

            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
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
}
