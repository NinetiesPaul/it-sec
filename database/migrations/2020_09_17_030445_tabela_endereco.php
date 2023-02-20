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
        Schema::create('address', function (Blueprint $table) {
            $table->id();
            $table->string('street')->nullable(true);
            $table->integer('number')->nullable(true);
            $table->string('detail1')->nullable(true);
            $table->string('detail2')->nullable(true);
            $table->string('zip')->nullable(true);
            $table->string('city')->nullable(true);
            $table->unsignedBigInteger('state_id')->nullable(true);
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
