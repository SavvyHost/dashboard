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
        Schema::table('pages', function (Blueprint $table) {
            $table->boolean('searchable')->default(false);
            $table->boolean('publish')->default(false);
			
			$table->string('seo_title')->nullable();
			$table->string('seo_description')->nullable();
			$table->string('featured_image')->nullable();

			$table->string('facebook_title')->nullable();
			$table->string('facebook_description')->nullable();
			$table->string('facebook_image')->nullable();

			$table->string('twitter_title')->nullable();
			$table->string('twitter_description')->nullable();
			$table->string('twitter_image')->nullable();
			
			$table->string('logo')->nullable();
			$table->string('header_style')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pages', function (Blueprint $table) {
			$table->dropColumn('searchable');
			$table->dropColumn('publish');
			$table->dropColumn('seo_title');
			$table->dropColumn('seo_description');
			$table->dropColumn('featured_image');
			$table->dropColumn('facebook_title');
			$table->dropColumn('facebook_description');
			$table->dropColumn('facebook_image');
			$table->dropColumn('twitter_title');
			$table->dropColumn('twitter_description');
			$table->dropColumn('twitter_image');
			$table->dropColumn('logo');
			$table->dropColumn('header_style');
        });
    }
};
