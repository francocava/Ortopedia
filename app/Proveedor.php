<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proveedor extends Model
{
    use SoftDeletes;
    protected $table = 'proveedores';

    public function producto() {
        return $this->hasMany('App\Producto');
    }

    public function accesorio() {
        return $this->hasMany('App\Accesorio');
    }

    public function pago() {
        return $this->hasMany('App\Pago');
    }
}
