<?php

namespace sgve;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $table = 'carreras';

    protected $fillable = ['nom_carrera', 'siglas', 'grupo', 'plantel_id'];

    public function viajes()
    {
    	return $this->hasMany(Viaje::class);
    }

    public function grupos()
    {
    	return $this->hasMany(Grupo::class);
    }
}
