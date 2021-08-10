<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;

    protected $table = 'clientes';

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['obraSocial'];

    protected $appends = ['nombreEntero'];


    public function pedidos()
    {
        return $this->hasMany('App\Pedido');
    }

    public function obraSocial()
    {
        return $this->belongsTo('App\ObraSocial', 'obra_id');
    }

    public function getNombreEnteroAttribute()
    {
        return  "{$this->nombre} {$this->apellido}";
    }
}
