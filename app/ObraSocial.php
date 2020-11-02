<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ObraSocial extends Model
{
    use SoftDeletes;

    protected $table = 'obras_sociales';

    public function clientes() {
        return $this->hasMany('App\Cliente', 'obra_id');
    }
}
