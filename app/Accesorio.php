<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Accesorio extends Model
{
    use SoftDeletes;

    protected $with = ['proveedor'];

    public function pedidoItemAccesorio() {
        return $this->hasMany('App\PedidoItemAccesorio');
    }

    public function proveedor() {
        return $this->belongsTo('App\Proveedor');
    }

    public function producto() {
        return $this->belongsToMany('App\Producto');
    }
}
