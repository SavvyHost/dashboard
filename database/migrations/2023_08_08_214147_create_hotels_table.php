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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->string('lat');
            $table->string('lng');
            $table->string('banner');
            $table->double('min_rate');
            $table->double('max_rate');
            
            $table->unsignedBigInteger('hotel_category_id');
            $table->unsignedBigInteger('destination_id');
            $table->unsignedBigInteger('zone_id');
            $table->unsignedBigInteger('currency_id');
            $table->unsignedBigInteger('supplier_id');
            
            $table->timestamps();
            
            $table->foreign('hotel_category_id')->on('hotel_categories')->references('id')->onDelete('CASCADE');
            $table->foreign('destination_id')->on('destinations')->references('id')->onDelete('CASCADE');
            $table->foreign('zone_id')->on('zones')->references('id')->onDelete('CASCADE');
            $table->foreign('currency_id')->on('currencies')->references('id')->onDelete('CASCADE');
            $table->foreign('supplier_id')->on('suppliers')->references('id')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
