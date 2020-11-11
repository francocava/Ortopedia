<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedido extends Model
{
    use SoftDeletes;

    protected $with = ['cliente:id,apellido'];

    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }

    public function usuario()
    {
        return $this->belongsTo('App\Usuario');
    }

    public function sucursal()
    {
        return $this->belongsTo('App\Sucursal');
    }

    public function estado()
    {
        return $this->belongsTo('App\Estado');
    }

    public function cobro()
    {
        return $this->hasMany('App\Cobro');
    }

    public function pago()
    {
        return $this->hasMany('App\Pago');
    }

    public function pedidoItem()
    {
        return $this->hasMany('App\PedidoItem');
    }

    public function factura()
    {
        return $this->hasMany('App\Factura');
    }
}
