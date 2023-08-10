<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::dropIfExists('tour_terms');
        Schema::dropIfExists('tour_types');
        Schema::dropIfExists('tour_locations');
        Schema::dropIfExists('tour_category');
        Schema::dropIfExists('tour_attr');
        Schema::dropIfExists('tours');
        Schema::dropIfExists('meal_room');
        Schema::dropIfExists('room_sups');
        Schema::dropIfExists('room_exceptions');
        Schema::dropIfExists('room_terms');
        Schema::dropIfExists('room_attrs');
        Schema::dropIfExists('rooms');
        Schema::dropIfExists('room_types');
        Schema::dropIfExists('meals');
        Schema::dropIfExists('hotel_attr');
        Schema::dropIfExists('hotel_terms');
        Schema::dropIfExists('hotel_exceptions');
        Schema::dropIfExists('hotel_attrs');
        Schema::dropIfExists('house_policy');
        Schema::dropIfExists('hotel_cancellation');
        Schema::dropIfExists('hotels');
        Schema::dropIfExists('booking');
        Schema::dropIfExists('currencies');
        Schema::dropIfExists('subscribers');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->integer('id', true);
            $table->text('name');
            $table->decimal('price', 10);
            $table->text('location');
            $table->text('description');
            $table->text('banner');
            $table->text('images')->default(' ');
            $table->text('terms')->default(' ');
            $table->text('cancellation')->default('\'\' \'\'');
            $table->text('creation_date');
            $table->timestamp('updated_at')->useCurrent();
        });
    }
};
