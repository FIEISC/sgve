<?php

namespace sgve;

use Illuminate\Database\Eloquent\Model;

class Plantel extends Model
{
    protected $table = 'planteles';

    protected $fillable = ['nom_plantel', 'siglas', 'campus_id'];

    public function campus()
    {
    	return $this->belongsTo(Campus::class);
    }
}
