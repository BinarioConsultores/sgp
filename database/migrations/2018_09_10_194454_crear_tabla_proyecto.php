<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaProyecto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_proyecto', function (Blueprint $table) {
            $table->increments('pro_id');
            $table->text('pro_nom');
            $table->text('pro_ubi');
            $table->decimal('pro_cd');
            $table->decimal('pro_gg');
            $table->decimal('pro_uti');
            $table->date('pro_fechin');
            $table->date('pro_fechfin');
            $table->text('pro_tipo');
            $table->integer('cli_id')->unsigned();
            $table->foreign('cli_id')->references('cli_id')->on('t_cliente');
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
        Schema::dropIfExists('t_proyecto');
    }
}
