<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Verifiksipersertadidikbaru extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('Verifiksipersertadidikbaru', function (Blueprint $table) {
            $table->increments('id_verifikasi');
             $table->integer('id_verifikasi_perserta_didik')->unsigned();
            // $table->index('id_peserta_didik');
            $table->foreign('id_verifikasi_perserta_didik')->references('id_peserta_didik')->on('pesertadidikbaru')->onDelete('cascade')->onUpdate('cascade');
            $table->string('status_verifikasi');
            $table->string('nama_lengkap');
            $table->string('nama_panggilan');
            $table->string('nisn')->unique();
            $table->string('nis')->unique();
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
