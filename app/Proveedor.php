<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proveedor extends Model
{
    use SoftDeletes;

    protected $table = 'proveedores';

    public function productos()
    {
        return $this->hasMany('App\Producto');
    }

    public function accesorios()
    {
        return $this->hasMany('App\Accesorio');
    }

    public function pagos()
    {
        return $this->hasMany('App\Pago');
    }
}
