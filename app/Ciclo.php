<?php

namespace sgve;

use Illuminate\Database\Eloquent\Model;

class Ciclo extends Model
{
    protected $table = 'ciclos';

    protected $fillable = ['nom_ciclo', 'ciclo', 'fec_ini', 'fec_fin', 'activo'];

    public function viajes()
    {
    	return $this->hasMany(Viaje::class);
    }
}
