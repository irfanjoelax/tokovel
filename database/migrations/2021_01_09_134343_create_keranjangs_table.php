<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeranjangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keranjangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->uuid('idprd_krj');
            $table->string('nmprd_krj', 200);
            $table->string('gbrprd_krj');
            $table->unsignedInteger('hrgprd_krj');
            $table->unsignedTinyInteger('jml_krj');
            $table->unsignedInteger('ttl_krj');
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
        Schema::dropIfExists('keranjangs');
    }
}
