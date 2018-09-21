<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPrecio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_precio', function (Blueprint $table) {
            $table->increments('prec_id');
            $table->decimal('prec_monto');
            $table->integer('recum_id')->unsigned();
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
        Schema::dropIfExists('t_precio');
    }
}
