<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaProyectousuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_proyectousuario', function (Blueprint $table) {
            $table->increments('prousu_id');
            $table->string('prousu_cargo');
            $table->integer('pro_id')->unsigned();
            $table->integer('usu_id')->unsigned();
            $table->foreign('pro_id')->references('pro_id')->on('t_proyecto');
            $table->foreign('usu_id')->references('usu_id')->on('t_usuario');
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
        Schema::dropIfExists('t_proyectousuario');
    }
}
