<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PedidoItemAccesorio extends Model
{
    use SoftDeletes;

    public function pedidoItem()
    {
        return $this->belongsTo('App\PedidoItem');
    }

    public function pedidoItemAccesorios()
    {
        return $this->belongsTo('App\PedidoItemAccesorio');
    }
}
