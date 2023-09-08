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
        Schema::table('hotel_policies', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('image');

            $table->string('title');
            $table->text('description');
            $table->string('icon')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hotel_policies', function (Blueprint $table) {
            //
        });
    }
};