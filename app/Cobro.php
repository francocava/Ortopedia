<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cobro extends Model
{
    use SoftDeletes;

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['formaPago'];

    public function pedido()
    {
        return $this->belongsTo('App\Pedido');
    }

    public function formaPago()
    {
        return $this->belongsTo('App\FormaPago');
    }
}
