<?php

namespace sgve;

use Illuminate\Database\Eloquent\Model;

class Plantel extends Model
{
    protected $table = 'planteles';

    protected $fillable = ['nom_plantel', 'siglas', 'campus_id'];

/*Relacion 1:N con usuarios*/
    public function users()
    {
    	return $this->hasMany(User::class);
    }

/*Relacion 1:N con campus*/
    public function campus()
    {
    	return $this->belongsTo(Campus::class);
    }
}
