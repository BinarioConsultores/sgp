<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaAnalisiscostounitario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_analisiscostounitario', function (Blueprint $table) {
            $table->increments('acu_id');
            $table->decimal('acu_prec');
            $table->decimal('acu_cant');
            $table->decimal('acu_cuad');
            $table->integer('part_id')->unsigned();
            $table->integer('recum_id')->unsigned();
            $table->integer('acu_idpadre')->unsigned();

            $table->foreign('part_id')->references('part_id')->on('t_partida');
            $table->foreign('recum_id')->references('recum_id')->on('t_recursounidadmedida');
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
        Schema::dropIfExists('t_analisiscostounitario');
    }
}
