<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabelaAtendimentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atendimentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            $table->dateTime('data');
            $table->string('descricao');
            $table->dateTime('respondido_em')->nullable(true);
            $table->unsignedBigInteger('respondido_por')->nullable(true);
            $table->dateTime('finalizado_em')->nullable(true);
            $table->string('observacao')->nullable(true);

            $table->foreign('cliente_id')->references('id')->on('cliente');
            $table->foreign('respondido_por')->references('id')->on('agente');
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
