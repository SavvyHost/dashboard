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
        Schema::create('hotels', function (Blueprint $table) {
            $table->integer('id', true);
            $table->text('name');
            $table->decimal('price', 10);
            $table->text('location');
            $table->text('description');
            $table->text('banner');
            $table->text('images')->default(' ');
            $table->text('terms')->default(' ');
            $table->text('cancellation')->default('\'\' \'\'');
            $table->text('creation_date');
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotels');
    }
};
