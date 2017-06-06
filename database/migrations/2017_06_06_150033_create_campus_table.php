<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampusTable extends Migration
{
    public function up()
    {
        Schema::create('campus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom_campus');
            $table->string('delegacion');
            $table->string('universidad');
            //$table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('campus');
    }
}
