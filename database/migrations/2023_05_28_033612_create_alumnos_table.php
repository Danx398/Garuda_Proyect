<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_alumnos', function (Blueprint $table) {
            $table->id('id');
            $table->integer('num_control');
            $table->string('carrera');
            $table->unsignedBigInteger('fk_escuela_procedencia');
            $table->date('fecha_ingreso_tec');
            $table->unsignedBigInteger('fk_persona');
            $table->timestamps();

            $table->foreign('fk_persona')->references('id')->on('t_personas');
            $table->foreign('fk_escuela_procedencia')->references('id')->on('t_cat_escuela_procedencias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
}
