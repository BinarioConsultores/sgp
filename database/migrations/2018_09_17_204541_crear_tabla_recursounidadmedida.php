<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaRecursounidadmedida extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_recursounidadmedida', function (Blueprint $table) {
            $table->increments('recum_id');
            $table->integer('rec_id')->unsigned();
            $table->integer('um_id')->unsigned();
            $table->foreign('rec_id')->references('rec_id')->on('t_recurso');
            $table->foreign('um_id')->references('um_id')->on('t_unidadmedida');
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
        Schema::dropIfExists('t_recursounidadmedida');
    }
}
