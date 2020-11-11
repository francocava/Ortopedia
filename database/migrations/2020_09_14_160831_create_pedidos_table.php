<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id');
            $table->foreignId('sucursal_id');
            $table->foreignId('usuario_id');
            $table->foreignId('factura_id')->nullable();
            $table->date('fecha_ingreso_autorizacion');
            $table->date('fecha_retiro');
            $table->string('fl_ct');
            $table->bigInteger('nro_recibo_proveedor')->nullable();
            $table->boolean('cancelado');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('cliente_id')
                ->references('id')->on('clientes')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('sucursal_id')
                ->references('id')->on('sucursales')
                ->onUpdate('cascade')
                ->onDelete('restrict');


            $table->foreign('usuario_id')
                ->references('id')->on('usuarios')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('factura_id')
                ->references('id')->on('facturas')
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
        Schema::dropIfExists('pedidos');
    }
}
