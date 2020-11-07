<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use SoftDeletes;

    protected $with = ['proveedor'];

    public function proveedor() {
        return $this->belongsTo('App\Proveedor');
    }

    public function pedidoItem() {
        return $this->hasMany('App\PedidoItem');
    }

    public function accesorio() {
        return $this->belongsToMany('App\Accesorio');
    }

}
