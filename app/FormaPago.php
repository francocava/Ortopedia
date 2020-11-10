<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormaPago extends Model
{
    use SoftDeletes;

    protected $table = 'formas_pagos';

    public function cobros()
    {
        return $this->hasMany('App\Cobro');
    }

    public function pagos()
    {
        return $this->hasMany('App\Pago');
    }
}
