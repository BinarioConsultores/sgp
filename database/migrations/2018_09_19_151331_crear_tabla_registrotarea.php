<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaRegistrotarea extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_registrotarea', function (Blueprint $table) {
           $table->increments('regitar_id');
            $table->decimal('regitar_por');
            $table->string('regitar_tit');
            $table->string('regitar_desc');
            $table->string('regitar_tiporeg');
            $table->date('regitar_fech');
            $table->integer('tar_id')->unsigned();
            $table->foreign('tar_id')->references('tar_id')->on('t_tarea');
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
        Schema::dropIfExists('t_registrotarea');
    }
}
