<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PedidoItem extends Model
{
    use SoftDeletes;

    protected $with = ['producto:id,nombre', 'accesorio:id,nombre']; //poniendolo asi solo me trae el nombre

    public function producto()
    {
        return $this->belongsTo('App\Producto');
    }

    public function pedido()
    {
        return $this->belongsTo('App\Pedido');
    }

    public function accesorio()
    {
        return $this->belongsTo('App\Accesorio');
    }

    public function getPrecioFinalAttribute()
    {
        return ($this->precio_item - ($this->precio_item) * ($this->porcentaje_os / 100));
    }
}
