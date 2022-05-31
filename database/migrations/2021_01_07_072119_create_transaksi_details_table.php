<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_details', function (Blueprint $table) {
            $table->bigInteger('id_det')->autoIncrement();
            $table->uuid('trx_id');
            $table->uuid('prd_id');
            $table->unsignedTinyInteger('jml_det');
            $table->unsignedInteger('ttl_det');
            $table->timestamps();

            // FOREIGN KEY
            $table->foreign('trx_id')->references('id_trx')->on('transaksis');
            $table->foreign('prd_id')->references('id_prd')->on('produks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi_details');
    }
}
