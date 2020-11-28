<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proveedor_id');
            $table->foreignId('pedido_id');
            $table->foreignId('forma_pago_id');
            $table->integer('nro_confirmacion')->nullable();
            $table->float('monto');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('proveedor_id')
                ->references('id')->on('proveedores')
                ->onUpdate('cascade')
                ->onDelete('restrict');

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
        Schema::dropIfExists('pagos');
    }
}
