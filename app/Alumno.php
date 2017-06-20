<?php

namespace sgve;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'alumnos';

    protected $fillable = ['nom_alumno', 'no_cuenta', 'nom_padre', 'tel_padre', 'no_imss', 'semestre', 'activo', 'plantel_id', 'carrera_id']; 

    public function grupos()
    {
    	return $this->belongsToMany(Grupo::class);
    }
}
