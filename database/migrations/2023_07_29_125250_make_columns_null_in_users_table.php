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
        Schema::table('users', function (Blueprint $table) {
			$table->text('username')->nullable()->change();
			$table->integer('gender')->nullable()->change();
			$table->string('phone', 20)->nullable()->change();
			$table->text('country')->nullable()->change();
			$table->text('bio')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
			$table->text('username')->nullable(false)->change();
			$table->integer('gender')->nullable(false)->change();
			$table->string('phone', 20)->nullable(false)->change();
			$table->text('country')->nullable(false)->change();
			$table->text('bio')->nullable(false)->change();
        });
    }
};
