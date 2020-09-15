<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;

    public function pedido(){
        return $this->hasMany('App\Pedido');
    }

    public function obraSocial(){
        return $this->belongsTo('App\ObraSocial');
    }
}
