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
        Schema::create('subfeatures', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->string('description');
			$table->string('icon');
			$table->unsignedBigInteger('feature_id');
			$table->timestamps();
			
			$table->foreign('feature_id')->on('features')->references('id')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subfeatures');
    }
};
