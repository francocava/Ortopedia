<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use SoftDeletes;

    protected $with = ['proveedor'];

    protected $appends = ['cantidad'];
    

    public function proveedor()
    {
        return $this->belongsTo('App\Proveedor');
    }

    public function pedidoItems()
    {
        return $this->hasMany('App\PedidoItem');
    }

    public function accesorios()
    {
        return $this->belongsToMany('App\Accesorio', 'accesorio_producto');
    }

    public function getCantidadAttribute() {
        return 1; //esto es un mini hack para el front
    }
}
