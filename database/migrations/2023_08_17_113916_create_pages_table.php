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
        //     Schema::create('pages', function (Blueprint $table) {
        //         $table->bigIncrements('id');
        //         $table->string('name');
        //         $table->boolean('searchable')->default(false);
        //         $table->boolean('publish')->default(false);
        //         $table->string('seo_title')->nullable();
        //         $table->string('seo_description')->nullable();
        //         $table->string('seo_image')->nullable();
        //         $table->string('featured_image')->nullable();
        //         $table->string('facebook_title')->nullable();
        //         $table->string('facebook_description')->nullable();
        //         $table->string('facebook_image')->nullable();
        //         $table->string('twitter_title')->nullable();
        //         $table->string('twitter_description')->nullable();
        //         $table->string('twitter_image')->nullable();
        //         $table->timestamps();
        //     });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('pages');
    }
};
