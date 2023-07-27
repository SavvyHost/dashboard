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
        Schema::table('house_policy', function (Blueprint $table) {
            $table->foreign(['hotel_id'], 'house_policy_ibfk_1')->references(['id'])->on('hotels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('house_policy', function (Blueprint $table) {
            $table->dropForeign('house_policy_ibfk_1');
        });
    }
};
