<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormaPago extends Model
{
    use SoftDeletes;
    protected $table = 'formas_pagos';

    public function cobro() {
        return $this->hasMany('App\Cobro');
    }

    public function pago() {
        return $this->hasMany('App\Pago');
    }
    
}
