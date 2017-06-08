<?php

namespace sgve;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nom_docente', 'no_cuenta', 'email', 'password', 'rol', 'plantel_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


/*Funcion para checar el rol de cada usuario*/
    public function hasRoles(array $roles)
    {
        foreach ($roles as $rol) 
        {
            if ($this->rol === $rol) 
            {
                return true;
            }
        }

        return false;
    }

/*Relacion 1:N con planteles*/
    public function plantel()
    {
    	return $this->belongsTo(Plantel::class);
    }
}
