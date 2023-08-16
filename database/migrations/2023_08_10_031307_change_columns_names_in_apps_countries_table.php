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
            $table->renameColumn('country_name', 'name');
            $table->renameColumn('country_code', 'code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('apps_countries', function (Blueprint $table) {
            $table->renameColumn('name', 'country_name');
            $table->renameColumn('code', 'country_code');
        });
    }
};