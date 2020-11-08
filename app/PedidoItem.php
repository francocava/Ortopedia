<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PedidoItem extends Model
{
    use SoftDeletes;

    public function producto()
    {
        return $this->belongsTo('App\Producto');
    }

    public function pedido()
    {
        return $this->belongsTo('App\Pedido');
    }

    public function pedidoItemAccesorio()
    {
        return $this->hasMany('App\PedidoItemAccesorio');
    }
}
