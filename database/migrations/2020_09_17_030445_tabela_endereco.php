<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabelaEndereco extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('endereco', function (Blueprint $table) {
            $table->id();
            $table->string('rua')->nullable(true);
            $table->integer('numero')->nullable(true);
            $table->string('bairro')->nullable(true);
            $table->string('cep')->nullable(true);
            $table->string('cidade')->nullable(true);
            $table->string('complemento')->nullable(true);
            $table->unsignedBigInteger('estado_id')->nullable(true);
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
