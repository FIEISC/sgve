<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnoGrupoTable extends Migration
{
    public function up()
    {
        Schema::create('alumno_grupo', function (Blueprint $table) {
            $table->increments('id');

            //Llaves foraneas!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            $table->integer('alumno_id')->unsigned();
            $table->foreign('alumno_id')->references('id')->on('alumnos')->onDelete('cascade');

            $table->integer('grupo_id')->unsigned();
            $table->foreign('grupo_id')->references('id')->on('grupos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('alumno_grupo');
    }
}
