<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DataIbuPesertadidik extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('DataIbuPesertadidik', function (Blueprint $table) {
            $table->increments('id_data_ibu');
             $table->integer('id_ibu_peserta_didik')->unsigned();
           $table->foreign('id_ibu_peserta_didik')->references('id_peserta_didik')->on('pesertadidikbaru')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nama_ibu');
            $table->string('tahun_lahir_ibu');
            $table->string('kebutuhan_khusus');
            $table->string('perkerjaan_ibu');
            $table->string('pendidikan_ibu');
            $table->string('penghasilan_ibu');
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
        Schema::dropIfExists('DataIbuPesertadidik');
    }
}
