<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasApiTokens, SoftDeletes;

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['Rol'];

    protected $hidden = [
        'password',
    ];

    public function rol()
    {
        return $this->belongsTo('App\Rol');
    }

    public function pedidos()
    {
        return $this->hasMany('App\Pedido');
    }
}
