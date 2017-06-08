<?php

namespace sgve;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $table = 'carreras';

    protected $fillable = ['nom_carrera', 'siglas', 'grupo', 'plantel_id'];
}
