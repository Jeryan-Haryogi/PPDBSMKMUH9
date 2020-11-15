<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DataBeasiswaPesertaDidik extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('DataBeasiswaPesertaDidik', function (Blueprint $table) {
            $table->increments('id_beasiswa');
              $table->integer('id_beasiswa_peserta_didik')->unsigned();
            // $table->index('id_peserta_didik');
            $table->foreign('id_beasiswa_peserta_didik')->references('id_peserta_didik')->on('pesertadidikbaru')->onDelete('cascade')->onUpdate('cascade');
            $table->string('jenis_beasiswa');
            $table->string('sumber_beasiswa');
            $table->string('tahun_mulai');
            $table->string('tahun_selesai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
