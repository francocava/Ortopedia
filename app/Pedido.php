<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedido extends Model
{
    use SoftDeletes;

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['cliente'];

    protected $appends = ['cancelado', 'importe'];

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

    public function cobros()
    {
        return $this->hasMany('App\Cobro');
    }

    public function pagos()
    {
        return $this->hasMany('App\Pago');
    }

    public function pedidoItems()
    {
        return $this->hasMany('App\PedidoItem');
    }

    public function factura()
    {
        return $this->hasMany('App\Factura');
    }

    public function getCanceladoAttribute()
    {
        $importe = $this->pedidoItems->reduce(function ($carry, $item) {
            return $carry + $item->precio_final;
        }, 0);

        $pagado = $this->pagos->reduce(function ($carry, $item) {
            return $carry + $item->monto;
        }, 0);

        if ($pagado === 0) {
            return 0;
        } else if ($importe > $pagado) {
            return 1; //pago parcial
        } else {
            return 2; //pago total
        }
    }

    public function getImporteAttribute()
    {
        return $this->pedidoItems->reduce(function ($carry, $item) {
            return $carry + $item->precio_final;
        }, 0);
    }
}
