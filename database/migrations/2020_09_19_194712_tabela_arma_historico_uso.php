<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabelaArmaHistoricoUso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arma_historico_uso', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('arma_id');
            $table->unsignedBigInteger('agente_id');
            $table->dateTime('inicio_de_uso');
            $table->dateTime('fim_de_uso')->nullable(true);

            $table->foreign('arma_id')->references('id')->on('arma');
            $table->foreign('agente_id')->references('id')->on('agente');
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
