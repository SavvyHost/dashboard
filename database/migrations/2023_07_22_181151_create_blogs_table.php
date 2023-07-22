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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id')->index('blogs_category_id_foreign');
            $table->integer('user_id')->index('blogs_user_id_foreign');
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
