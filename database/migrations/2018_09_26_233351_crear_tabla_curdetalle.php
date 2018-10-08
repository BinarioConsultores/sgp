<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaCurdetalle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_curdetalle', function (Blueprint $table) {
            $table->increments('curd_id');
            $table->decimal('curd_cant');
            $table->decimal('curd_prec');
            $table->integer('curd_idpadre')->unsigned();
            $table->integer('recum_id')->unsigned();
            $table->integer('cur_id')->unsigned();
            $table->foreign('recum_id')->references('recum_id')->on('t_recursounidadmedida');
            $table->foreign('cur_id')->references('cur_id')->on('t_cur');
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
        //
    }
}
