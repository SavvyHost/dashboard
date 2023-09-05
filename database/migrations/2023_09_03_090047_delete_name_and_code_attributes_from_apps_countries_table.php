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
        Schema::table('apps_countries', function (Blueprint $table) {
            $table->string('name')->nullable()->change();
            $table->string('code')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('apps_countries', function (Blueprint $table) {
            $table->string('name')->nullable(false)->change();
            $table->string('code')->nullable(false)->change();
        });
    }
};