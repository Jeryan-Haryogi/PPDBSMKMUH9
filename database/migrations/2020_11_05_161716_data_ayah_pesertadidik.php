<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DataAyahPesertadidik extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('DataAyahPesertadidik', function (Blueprint $table) {
            $table->increments('id_data_ayah');
            $table->integer('id_ayah_peserta_didik')->unsigned();
           $table->foreign('id_ayah_peserta_didik')->references('id_peserta_didik')->on('pesertadidikbaru')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nama_ayah');
            $table->string('tahun_lahir_ayah');
            $table->string('kebutuhan_khusus');
            $table->string('perkerjaan_ayah');
            $table->string('pendidikan_ayah');
            $table->string('penghasilan_ayah');
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
         Schema::dropIfExists('DataAyahPesertadidik');
    }
}

