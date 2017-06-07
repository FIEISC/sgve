<?php

namespace sgve;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    protected $table = 'campus';

    protected $fillable = ['nom_campus', 'delegacion', 'universidad'];

    public function planteles()
    {
    	return $this->hasMany(Plantel::class);
    }
}
