<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabelaVeiculo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veiculo', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo', ['MOTO', 'VEICULO_4P', 'VEICULO_2P', 'OUTRO_TIPO']);
            $table->string('fabricante');
            $table->string('modelo');
            $table->integer('ano');
            $table->string('renavam');
            $table->string('placa');
            $table->string('cor');
            $table->boolean('disponibilidade')->default(true);
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
