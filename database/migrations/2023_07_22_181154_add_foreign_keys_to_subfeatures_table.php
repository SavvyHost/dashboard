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
        Schema::table('subfeatures', function (Blueprint $table) {
            $table->foreign(['feature_id'])->references(['id'])->on('features')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subfeatures', function (Blueprint $table) {
            $table->dropForeign('subfeatures_feature_id_foreign');
        });
    }
};
