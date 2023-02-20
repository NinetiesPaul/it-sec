<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAreaFkToAgent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agent', function (Blueprint $table) {
            $table->unsignedBigInteger('area_id')->nullable(true);
            $table->foreign('area_id')->references('id')->on('area');
        });
    }

    /**
     * Reverse the migrations.
     *R
     * @return void
     */
    public function down()
    {
        //
    }
}
