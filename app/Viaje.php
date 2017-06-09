<?php

namespace sgve;

use Illuminate\Database\Eloquent\Model;

class Viaje extends Model
{
    protected $table = 'viajes';

    protected $fillable = ['nom_viaje', 'motivos', 'impacto', 'fec_ini', 'fec_fin', 'aceptado', 'activo', 'compa', 'user_id', 'carrera_id', 'ciclo_id', 'plantel_id'];
}
