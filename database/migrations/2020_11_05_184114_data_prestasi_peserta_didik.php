<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DataPrestasiPesertaDidik extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     Schema::create('DataPrestasiPesertaDidik', function (Blueprint $table) {
            $table->increments('id_prestasi');
              $table->integer('id_prestasi_peserta_didik')->unsigned();
            // $table->index('id_peserta_didik');
            $table->foreign('id_prestasi_peserta_didik')->references('id_peserta_didik')->on('pesertadidikbaru')->onDelete('cascade')->onUpdate('cascade');
            $table->string('jenis_lomba');
            $table->string('tingkat');
            $table->string('nama_prestasi');
            $table->string('tahun');
            $table->string('penyelenggara');
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
        Schema::dropIfExists('DataPrestasiPesertaDidik');
    }
}
