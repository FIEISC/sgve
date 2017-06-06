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
            $table->string('semestre');
            $table->boolean('aceptado')->default(0);
            $table->boolean('activo')->default(1);
            $table->string('compa');

            //Laves foreaneas del docente que crea el viaje y el plantel al que pertenece!!!
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('carrera_id')->references('id')->on('carreras')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('viajes');
    }
}
