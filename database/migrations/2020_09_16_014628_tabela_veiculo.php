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
        Schema::create('vehicle', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['MOTORCYCLE', '4_DOOR', '2_DOOR', 'OTHER']);
            $table->string('make');
            $table->string('model');
            $table->integer('year');
            $table->string('register');
            $table->string('license');
            $table->string('color');
            $table->boolean('is_available')->default(true);
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
