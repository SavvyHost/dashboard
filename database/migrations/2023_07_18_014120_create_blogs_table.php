<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->onDelete("cascade")->onUpdate('cascade');
            $table->integer('user_id')->length(255);
            $table->foreign('user_id')->references('id')->on('users')->onDelete("cascade")->onUpdate('cascade');
            $table->string('title');
            $table->string('image')->nullable();
            $table->text('content');
            $table->enum('status', ['publish', 'draft'])->default('publish');
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
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
};
