<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabelaVeiculoHistoricoUso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_usage_history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehicle_id');
            $table->unsignedBigInteger('agent_id');
            $table->dateTime('started_on');
            $table->dateTime('ended_on')->nullable(true);

            $table->foreign('vehicle_id')->references('id')->on('vehicle');
            $table->foreign('agent_id')->references('id')->on('agent');
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
