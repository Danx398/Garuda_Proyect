<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_personas', function (Blueprint $table) {
            $table->id('id_persona');
            $table->string('nombre');
            $table->string('paterno');
            $table->string('materno');
            $table->integer('num_celular');
            $table->string('genero');
            $table->date('fechaNac');
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
        Schema::dropIfExists('personas');
    }
}
