<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ArsipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arsip', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_pt');
            $table->string('nama_pemilik');
            $table->string('no_sk');
            $table->string('tanggal');
            $table->string('pj_izin_id');
            $table->string('jns_izin_id');
            $table->string('sektor_id');
            $table->string('lemari_id');
            $table->string('dus_id');
            $table->string('saf_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arsip');
    }
}
