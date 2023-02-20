<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

class CreateTableAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('usuario');

        Schema::create('admin', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
        });

        Schema::table('admin', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

        $user = DB::table('users')->insert(
            array(
                'name' => 'admin',
                'email' => 'admin@mail.com',
                'password' => Hash::make("adminadmin"),
            )
        );
        
        DB::table('admin')->insert(
            array(
                'user_id' => DB::table('users')->max('id')
            )
        );
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
