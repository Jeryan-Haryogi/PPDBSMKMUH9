<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\QueryException;
class Pesertadidikbaru extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('Pesertadidikbaru', function (Blueprint $table) {
            $table->increments('id_peserta_didik');
            $table->string('nama_lengkap');
            $table->string('nama_panggilan');
            $table->string('foto');
            $table->string('jenis_kelamin');
            $table->string('nisn')->unique();
            $table->string('nis')->unique();
            $table->string('asal_sekolah');
            $table->string('nik')->unique();
            $table->string('ttgl');
            $table->string('jurusan');
            $table->string('agama');
            $table->string('kebutuhan_khusus');
            $table->longText('alamat');
            $table->string('perumahan');
            $table->string('rt');
            $table->string('rw');
            $table->string('provinsi');
            $table->string('kabupaten');
            $table->string('kelu_des');
            $table->string('kecamatan');
            $table->string('kodepos');
             $table->string('alat_transpotasi');
            $table->string('jenis_tinggal');
            $table->string('no_tlprumah');
            $table->string('no_tlppribadi');
            $table->string('email_pribadi')->unique();
            $table->string('no_ujian');
            $table->string('penerima_pks');
             $table->string('no_pks');
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
         Schema::dropIfExists('Pesertadidikbaru');
    }
}
