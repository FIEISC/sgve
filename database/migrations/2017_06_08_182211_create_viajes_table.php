<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViajesTable extends Migration
{
    public function up()
    {
        Schema::create('viajes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom_viaje');
            $table->text('motivos');
            $table->text('impacto');
            $table->date('fec_ini');
            $table->date('fec_fin');
            /*$table->string('semestre');*/
            $table->boolean('aceptadoC')->default(0);
            $table->boolean('aceptadoD')->default(0);
            $table->boolean('activo')->default(1);
            $table->string('compa');

            //Laves foreaneas del docente que crea el viaje, el ciclo que se creo y la carrera al que pertenece!!!
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('carrera_id')->unsigned();
            $table->foreign('carrera_id')->references('id')->on('carreras')->onDelete('cascade');

            $table->integer('ciclo_id')->unsigned();
            $table->foreign('ciclo_id')->references('id')->on('ciclos')->onDelete('cascade');

            $table->integer('plantel_id')->unsigned();
            $table->foreign('plantel_id')->references('id')->on('planteles')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('viajes');
    }
}
