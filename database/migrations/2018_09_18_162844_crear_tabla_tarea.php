<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaTarea extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_tarea', function (Blueprint $table) {
           $table->increments('tar_id');
            $table->text('tar_nom');
            $table->string('tar_desc');
            $table->date('tar_fechin');
            $table->date('tar_fechfin');
            $table->string('tar_prio');
            $table->string('tar_est');
            $table->integer('tar_idpadre')->unsigned();
            $table->integer('pro_id')->unsigned();
            $table->integer('usu_id')->unsigned();
            //$table->foreign('tar_idpadre')->references('tar_idpadre')->on('t_tarea');
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
        Schema::dropIfExists('t_tarea');
    }
}
