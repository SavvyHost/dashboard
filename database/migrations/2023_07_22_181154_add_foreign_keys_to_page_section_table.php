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
        Schema::table('page_section', function (Blueprint $table) {
            $table->foreign(['section_id'])->references(['id'])->on('sections')->onDelete('CASCADE');
            $table->foreign(['page_id'])->references(['id'])->on('pages')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('page_section', function (Blueprint $table) {
            $table->dropForeign('page_section_section_id_foreign');
            $table->dropForeign('page_section_page_id_foreign');
        });
    }
};
