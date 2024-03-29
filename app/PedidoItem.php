<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PedidoItem extends Model
{
    use SoftDeletes;

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['producto:id,nombre,descripcion', 'accesorio:id,nombre,descripcion'];

    protected $appends = ['precio_final'];

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
        return (($this->precio_item - ($this->precio_item) * ($this->porcentaje_os / 100)) * $this->cantidad);
    }
}
