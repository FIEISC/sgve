<?php

namespace sgve;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table = 'grupos';

    protected $fillable = ['nom_grupo', 'semestre', 'viaje_id', 'ciclo_id', 'carrera_id', 'plantel_id'];

    public function viaje()
    {
    	return $this->belongsTo(Viaje::class);
    }

    public function carrera()
    {
    	return $this->belongsTo(Carrera::class);
    }
}
