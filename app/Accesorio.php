<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Accesorio extends Model
{
    use SoftDeletes;

    protected $appends = ['cantidad'];

    public function pedidoItems()
    {
        return $this->hasMany('App\PedidoItem');
    }

    public function proveedor()
    {
        return $this->belongsTo('App\Proveedor');
    }

    public function productos()
    {
        return $this->belongsToMany('App\Producto', 'accesorio_producto');
    }

    public function getCantidadAttribute() {
        return 1; //? esto es un mini hack para el front
    }
}
