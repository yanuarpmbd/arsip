<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePjizinJnsizinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pj_izin_jns_izin', function (Blueprint $table) {
            $table->integer('pj_izin_id');
            $table->integer('jns_izin_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pj_izin_jns_izin', function (Blueprint $table) {
            //
        });
    }
}
