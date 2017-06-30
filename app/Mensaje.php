<?php

namespace sgve;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    protected $guarded = ['id']; 

    public function sender()
    {
    	return $this->belongsTo(User::class, 'tx_user');
    }
}
