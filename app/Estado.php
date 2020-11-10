<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estado extends Model
{
    use SoftDeletes;

    public function pedidos()
    {
        return $this->hasMany('App\Pedido');
    }
}
