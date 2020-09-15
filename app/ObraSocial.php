<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ObraSocial extends Model
{
    use SoftDeletes;

    public function cliente(){
        return $this->hasMany('App\Cliente');
    }
}
