<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Factura extends Model
{
    use SoftDeletes;

    public function pedido()
    {
        return $this->belongsTo('App\Pedido');
    }
}
