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
        Schema::create('calls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->string('description');
            $table->dateTime('created_on');
            $table->unsignedBigInteger('awnsered_by')->nullable(true);
            $table->dateTime('awnsered_on')->nullable(true);
            $table->string('ended_by')->nullable(true);
            $table->dateTime('ended_on')->nullable(true);

            $table->foreign('client_id')->references('id')->on('client');
            $table->foreign('awnsered_by')->references('id')->on('agent');
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
