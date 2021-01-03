<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sucursal extends Model
{
    use SoftDeletes;

    protected $table = 'sucursales'; //Problema

    public function pedidos()
    {
        return $this->hasMany('App\Pedido');
    }
}
