<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tokenpilihjurusanpeserta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('Tokenpilihjurusanpeserta', function (Blueprint $table) {
            $table->increments('id_token');
              $table->integer('id_token_peserta_didik')->unsigned();
            // $table->index('id_peserta_didik');
            $table->foreign('id_token_peserta_didik')->references('id_peserta_didik')->on('pesertadidikbaru')->onDelete('cascade')->onUpdate('cascade');
            $table->string('jurusan');
            $table->string('token_jurusan');
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
                Schema::dropIfExists('Tokenpilihjurusanpeserta');

    }
}
