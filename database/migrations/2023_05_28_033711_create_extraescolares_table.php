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
            $table->integer('fk_alumno');
            $table->integer('fk_estatus');
            $table->string('evidencias');
            $table->integer('fk_credito');
            $table->integer('horas_liberadas');
            $table->string('constancia_liberada');
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
        Schema::dropIfExists('extraescolares');
    }
}
