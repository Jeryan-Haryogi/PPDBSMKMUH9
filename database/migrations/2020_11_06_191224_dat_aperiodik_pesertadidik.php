<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DatAperiodikPesertadidik extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('DatAperiodikPesertadidik', function (Blueprint $table) {
            $table->increments('id_data_periodik');
              $table->integer('id_periodik_peserta_didik')->unsigned();
            // $table->index('id_peserta_didik');
            $table->foreign('id_periodik_peserta_didik')->references('id_peserta_didik')->on('pesertadidikbaru')->onDelete('cascade')->onUpdate('cascade');
            $table->string('tinggi_badan');
            $table->string('berat_badan');
            $table->string('jarak_sekolah');
            $table->string('jarak_lebih_sekolah');
            $table->string('waktu_ke_sekolah');
            $table->string('waktu_lebih_ke_sekolah');
            $table->string('anak_ke_berapa');
            $table->string('dari_keberapa');
            $table->string('kandung');
            $table->string('tiri');
            $table->string('angkat');
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
