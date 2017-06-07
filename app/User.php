<?php

namespace sgve;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nom_docente', 'nom_cuenta', 'email', 'password', 'rol', 'plantel_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
