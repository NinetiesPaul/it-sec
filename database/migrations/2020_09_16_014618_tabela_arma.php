<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabelaArma extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arma', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo', ['PISTOLA', 'REVOLVER', 'ESCOPETA', 'OUTRO_TIPO']);
            $table->string('fabricante');
            $table->string('modelo');
            $table->string('n_serie');
            $table->string('observacoes')->nullable(true);
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
