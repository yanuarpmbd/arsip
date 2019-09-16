<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dus_kode');
            $table->string('jns_izin_id');
            $table->string('sektor_id');
            $table->string('pj_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dus');
    }
}
