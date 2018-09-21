<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_usuario', function (Blueprint $table) {
            $table->increments('usu_id');
            $table->text('usu_nom');
            $table->string('usu_tip');
            $table->string('usu_email');
            $table->string('usu_pass');
            $table->integer('per_id')->unsigned();
            $table->foreign('per_id')->references('per_id')->on('t_persona');
           
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_usuario');
    }
}
