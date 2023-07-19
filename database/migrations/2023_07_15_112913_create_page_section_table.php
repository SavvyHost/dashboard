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
        Schema::create('page_section', function (Blueprint $table) {
            $table->id();
			$table->unsignedBigInteger('page_id');
			$table->unsignedBigInteger('section_id');
            $table->timestamps();
			
			$table->foreign('page_id')->on('pages')->references('id')->onDelete('CASCADE');
			$table->foreign('section_id')->on('sections')->references('id')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('page_section');
    }
};
