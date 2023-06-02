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
            $table->id('id_extraescolares');
            $table->unsignedBigInteger('fk_alumno');
            $table->unsignedBigInteger('fk_estatus');
            $table->string('evidencias');
            $table->unsignedBigInteger('fk_credito');
            $table->integer('horas_liberadas');
            $table->string('constancia_liberada');
            $table->timestamps();

            $table->foreign('fk_alumno')->references('id_alumno')->on('t_alumnos');
            $table->foreign('fk_estatus')->references('id_estatus')->on('t_cat_estatus');
            $table->foreign('fk_credito')->references('id_credito')->on('t_cat_creditos');
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
