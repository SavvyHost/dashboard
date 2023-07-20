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
        Schema::create('events', function (Blueprint $table) {
			$table->id();
			$table->string('title');
			$table->string('image')->nullable();
			$table->text('content');
			$table->boolean('searchable')->default(false);
			
			$table->string('seo_title')->nullable();
			$table->string('seo_image')->nullable();
			$table->text('seo_description')->nullable();
			
			$table->string('facebook_title')->nullable();
			$table->string('facebook_image')->nullable();
			$table->text('facebook_description')->nullable();
			
			$table->string('twitter_title')->nullable();
			$table->string('twitter_image')->nullable();
			$table->text('twitter_description')->nullable();
			
			$table->date('start_date')->nullable();
			$table->date('end_date')->nullable();
			$table->string('location')->nullable();
			$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
