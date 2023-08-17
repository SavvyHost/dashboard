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
        // Schema::table('referencing_table_name', function ($table) {
        //     $table->dropForeign(['page_id']);
        // });

        // // Repeat the above line for each table that references the "pages" table.

        // Schema::table('pages', function ($table) {
        //     $table->dropIfExists();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};