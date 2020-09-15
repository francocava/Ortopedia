<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCobrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cobros', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pedido_id');
            $table->foreignId('forma_pago_id');
            $table->float('monto');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('pedido_id')
                ->references('id')->on('pedidos')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('forma_pago_id')
                ->references('id')->on('formas_pagos')
                ->onUpdate('cascade')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cobros');
    }
}
