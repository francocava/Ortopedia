<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pago extends Model
{
    use SoftDeletes;

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['proveedor', 'formaPago'];

    public function pedido()
    {
        return $this->belongsTo('App\Pedido');
    }

    public function proveedor()
    {
        return $this->belongsTo('App\Proveedor');
    }

    public function formaPago()
    {
        return $this->belongsTo('App\FormaPago');
    }
}
