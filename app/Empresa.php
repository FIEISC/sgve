<?php

namespace sgve;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresas';

    protected $fillable = ['nom_empresa', 'direccion', 'telefono', 'correo', 'contacto'];
    
    public function manyViajes()
    {
    	return $this->belongsToMany(Viaje::class);
    }
    
}
