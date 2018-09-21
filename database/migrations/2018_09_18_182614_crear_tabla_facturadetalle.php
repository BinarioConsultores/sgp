<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaFacturadetalle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_facturadetalle', function (Blueprint $table) {
            $table->increments('facd_id');
            $table->text('facd_desc');
            $table->integer('facd_cant');
            $table->decimal('facd_punit');
            $table->integer('fac_id')->unsigned();
            $table->foreign('fac_id')->references('fac_id')->on('t_factura');
            $table->integer('gas_id')->unsigned();
            $table->foreign('gas_id')->references('gas_id')->on('t_gasto');
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
        Schema::dropIfExists('t_facturadetalle');
    }
}
