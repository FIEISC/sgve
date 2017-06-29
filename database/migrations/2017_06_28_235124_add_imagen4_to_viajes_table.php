<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImagen4ToViajesTable extends Migration
{
    public function up()
    {
        Schema::table('viajes', function (Blueprint $table) {
            $table->string('imagen4')->after('imagen3')->default('default.png');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('viajes', function (Blueprint $table) {
            //
        });
    }
}
