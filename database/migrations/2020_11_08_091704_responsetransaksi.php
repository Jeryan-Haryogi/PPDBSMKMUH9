<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Responsetransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('Responsetransaksi', function (Blueprint $table) {
            $table->increments('id_transaksi');
              $table->integer('order_by_id')->unsigned();
            // $table->index('id_peserta_didik');
            $table->foreign('order_by_id')->references('id_peserta_didik')->on('pesertadidikbaru')->onDelete('cascade')->onUpdate('cascade');
            $table->string('status_codes');
            $table->string('status_message');
            $table->string('transaction_id');
            $table->string('gross_amount');
            $table->string('payment_type');
            $table->string('transaction_time');
            $table->string('transaction_status');
            $table->string('pdf_url');
            // berhasil di qrcode
            $table->string('fraud_status');
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
