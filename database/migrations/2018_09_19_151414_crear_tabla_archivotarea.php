<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaArchivotarea extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_archivotarea', function (Blueprint $table) {
            $table->increments('archita_id');
            $table->string('archita_nom');
            $table->double('archita_peso');
            $table->string('archita_tip');
            $table->string('archita_dir');
            $table->integer('regitar_id')->unsigned();
            $table->foreign('regitar_id')->references('regitar_id')->on('t_registrotarea');
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
        Schema::dropIfExists('t_archivotarea');
    }
}
