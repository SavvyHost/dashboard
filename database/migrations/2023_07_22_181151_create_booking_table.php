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
        Schema::create('booking', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('type', 20)->nullable();
            $table->integer('Object_id');
            $table->text('title')->nullable();
            $table->text('order_date')->nullable();
            $table->string('payment_status', 20)->nullable();
            $table->string('status', 20)->nullable()->default('Pending');
            $table->integer('customer')->nullable();
            $table->integer('payment_method')->nullable();
            $table->decimal('total', 10)->nullable();
            $table->string('invoice_id', 225)->nullable();
            $table->string('confirm_id', 225)->nullable();
            $table->bigInteger('price')->nullable();
            $table->integer('currency_id');
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking');
    }
};
