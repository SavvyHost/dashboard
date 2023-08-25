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
        Schema::table('subcribers', function (Blueprint $table) {
            Schema::dropIfExists('subcribers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subcribers', function (Blueprint $table) {
            $table->integer('id', true);
            $table->text('name');
            $table->text('email');
            $table->text('created_at');
            $table->timestamp('updated_at')->useCurrent();
        });
    }
};