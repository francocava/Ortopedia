<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    use SoftDeletes;

    protected $table = 'Usuarios';
    protected $with = ['Rol'];

    public function rol(){
        return $this->belongsTo('App\Rol');
    }

    public function pedido() {
        return $this->hasMany('App\Pedido');
    }

}
