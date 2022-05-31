<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->uuid('id_trx')->primary();
            $table->unsignedBigInteger('user_id');
            $table->text('almt_trx')->nullable();
            $table->string('telp_trx', 15)->nullable();
            $table->unsignedInteger('ongkir_trx')->nullable();
            $table->unsignedInteger('ttl_trx')->nullable();
            $table->string('stts_trx', 50)->nullable();
            $table->timestamps();

            // FOREIGN KEY
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
