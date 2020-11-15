<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DataWaliPesertadidik extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('DataWaliPesertadidik', function (Blueprint $table) {
           $table->increments('id_data_wali');
             $table->integer('id_wali_peserta_didik')->unsigned();
           
           $table->foreign('id_wali_peserta_didik')->references('id_peserta_didik')->on('pesertadidikbaru')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nama_wali');
            $table->string('tahun_lahir_wali');
            $table->string('kebutuhan_khusus');
            $table->string('perkerjaan_wali');
            $table->string('pendidikan_wali');
            $table->string('penghasilan_wali');
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
        Schema::dropIfExists('DataWaliPesertadidik');
    }
}
