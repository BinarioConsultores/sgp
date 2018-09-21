<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaEgreso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_egreso', function (Blueprint $table) {
            $table->increments('egre_id');
            $table->decimal('egre_monto');
            $table->integer('pro_id')->unsigned();
            $table->integer('facd_id')->unsigned();
            $table->integer('egre_idpadre')->unsigned();
            $table->foreign('pro_id')->references('pro_id')->on('t_proyecto');
            $table->foreign('facd_id')->references('facd_id')->on('t_facturadetalle');
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
        Schema::dropIfExists('t_egreso');
    }
}
