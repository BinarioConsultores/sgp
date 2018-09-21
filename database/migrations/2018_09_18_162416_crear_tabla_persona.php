    <?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPersona extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_persona', function (Blueprint $table) {
            $table->increments('per_id');
            $table->text('per_nom');
            $table->text('per_ape');
            $table->string('per_tel');
            $table->string('per_dni');
            $table->string('per_dir');
            $table->string('per_email');
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
        Schema::dropIfExists('t_persona');
    }
}
