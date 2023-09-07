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
        Schema::table('hotel_attributes', function (Blueprint $table) {
            $table->dropForeign(['city_id']);
            $table->dropForeign(['currency_id']);
            $table->dropColumn('city_id');
            $table->dropColumn('currency_id');
            $table->dropColumn('longitude');
            $table->dropColumn('latitude');
            $table->dropColumn('youtube_video');
            $table->dropColumn('star_rate');
            $table->dropColumn('banner');
            $table->dropColumn('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hotel_attributes', function (Blueprint $table) {
            $table->text('description');
            $table->text('banner')->nullable();
            $table->integer('star_rate');
            $table->text('youtube_video')->nullable();
            $table->double('latitude');
            $table->double('longitude');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('currency_id');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('currency_id')->references('id')->on('currencies');
        });
    }
};
