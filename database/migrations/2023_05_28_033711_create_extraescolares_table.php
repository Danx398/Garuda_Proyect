<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtraescolaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_extraescolares', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('fk_alumno');
            $table->unsignedBigInteger('fk_estatus');
            $table->string('evento_mooc_act');
            $table->string('evidencia');
            $table->string('ruta');
            $table->string('ruta_fisica');
            $table->unsignedBigInteger('fk_credito');
            $table->integer('horas_liberadas');
            $table->string('constancia_liberada');
            $table->timestamps();

            $table->foreign('fk_alumno')->references('id')->on('t_alumnos');
            $table->foreign('fk_estatus')->references('id')->on('t_cat_estatus');
            $table->foreign('fk_credito')->references('id')->on('t_cat_creditos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('extraescolares');
    }
}
