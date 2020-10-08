<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabelaVeiculoHistoricoManutencao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veiculo_historico_manutencao', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('veiculo_id');
            $table->date('inicio_de_manutencao');
            $table->date('fim_de_manutencao')->nullable(true);
            $table->string('local');
            $table->double('valor');
            $table->text('descricao');

            $table->foreign('veiculo_id')->references('id')->on('veiculo');
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
