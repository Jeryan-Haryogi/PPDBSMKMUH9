<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DaftarAkunPesertaBaru extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DaftarAkunPesertaBaru', function (Blueprint $table) {
            $table->increments('id_daftar_akun_peserta');
            $table->string('nisn')->unique();
            $table->string('nama_lengkap');
            $table->string('role_akses');
            $table->longText('password');
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
     Schema::dropIfExists('DaftarAkunPesertaBaru');

    }
}
