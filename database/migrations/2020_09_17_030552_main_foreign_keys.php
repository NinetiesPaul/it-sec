<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MainForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usuario', function (Blueprint $table) {
            $table->foreign('endereco_id')->references('id')->on('endereco');
        });

        Schema::table('endereco', function (Blueprint $table) {
            $table->foreign('estado_id')->references('id')->on('estado');
        });

        Schema::table('agente', function (Blueprint $table) {
            $table->foreign('usuario_id')->references('id')->on('usuario');
        });

        Schema::table('cliente', function (Blueprint $table) {
            $table->foreign('usuario_id')->references('id')->on('usuario');
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
