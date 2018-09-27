<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaCurdplazo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('t_curdplazo', function (Blueprint $table) {
            $table->increments('curdp_id');
            $table->decimal('curdp_cant');
            $table->date('curdp_fechin');
            $table->date('curdp_fechfin');
            $table->integer('curdp_nro');
            $table->integer('curd_id')->unsigned();
            $table->foreign('curd_id')->references('curd_id')->on('t_curdetalle');
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
