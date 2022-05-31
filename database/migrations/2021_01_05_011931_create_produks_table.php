<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->uuid('id_prd')->primary();
            $table->uuid('kat_id');
            $table->string('nm_prd', 200);
            $table->string('slug_prd', 220);
            $table->text('desk_prd');
            $table->unsignedInteger('hrg_prd');
            $table->unsignedTinyInteger('stok_prd');
            $table->unsignedSmallInteger('brt_prd');
            $table->string('gbr_prd');
            $table->timestamps();

            // FOREIGN KEY
            $table->foreign('kat_id')->references('id_kat')->on('kategoris');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produks');
    }
}
