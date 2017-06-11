<?php

namespace sgve;

use Illuminate\Database\Eloquent\Model;

class Viaje extends Model
{
    protected $table = 'viajes';

    protected $fillable = ['nom_viaje', 'motivos', 'impacto', 'fec_ini', 'fec_fin', 'aceptado', 'activo', 'compa', 'user_id', 'carrera_id', 'ciclo_id', 'plantel_id'];

/*Relacion 1:N con usuarios (quien crea el viaje)*/
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

/*Relacion 1:N con carreras*/
    public function carrera()
    {
        return $this->belongsTo(Carrera::class);
    }

  /*  public function getUsersAttribute()
    {
    	return $this->pluck('compa')->toArray();
    }*/
}
