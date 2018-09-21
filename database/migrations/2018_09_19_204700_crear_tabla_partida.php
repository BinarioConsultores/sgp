<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPartida extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_partida', function (Blueprint $table) {
            $table->increments('part_id');
            $table->string('part_nom');
            $table->decimal('part_prec');
            $table->decimal('part_met');
            $table->string('part_cod');
            $table->decimal('part_rend');
            $table->string('rec_cod');
            $table->integer('umr1_id')->unsigned();
            $table->integer('umr2_id')->unsigned();
            $table->integer('um_id')->unsigned();
            $table->integer('part_idpadre')->unsigned();
            $table->integer('pres_id')->unsigned();
            $table->foreign('umr1_id')->references('um_id')->on('t_unidadmedida');
            $table->foreign('umr2_id')->references('um_id')->on('t_unidadmedida');
            $table->foreign('um_id')->references('um_id')->on('t_unidadmedida');
            $table->foreign('pres_id')->references('pres_id')->on('t_presupuesto');
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
        Schema::dropIfExists('t_partida');
    }
}
