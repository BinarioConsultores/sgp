<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaFactura extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_factura', function (Blueprint $table) {
            $table->increments('fac_id');
            $table->string('fac_nro');
            $table->date('fac_fech');
            $table->integer('fac_tipo');
            $table->string('fac_est');
            $table->text('fac_obs');
            $table->integer('prov_id')->unsigned();
            $table->foreign('prov_id')->references('prov_id')->on('t_proveedor');
            $table->integer('emp_id')->unsigned();
            $table->foreign('emp_id')->references('emp_id')->on('t_empleado');
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
        Schema::dropIfExists('t_factura');
    }
}
