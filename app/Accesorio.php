<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Accesorio extends Model
{
    use SoftDeletes;

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['proveedor'];

    public function pedidoItems()
    {
        return $this->hasMany('App\PedidoItem');
    }

    public function proveedor()
    {
        return $this->belongsTo('App\Proveedor');
    }

    public function producto()
    {
        return $this->belongsToMany('App\Producto');
    }
}
