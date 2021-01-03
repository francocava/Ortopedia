<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('producto_id')->nullable();
            $table->foreignId('accesorio_id')->nullable();
            $table->foreignId('pedido_id');
            $table->float('precio_item')->nullable();
            $table->integer('porcentaje_os')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('pedido_id')
                ->references('id')->on('pedidos')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('producto_id')
                ->references('id')->on('productos')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('accesorio_id')
                ->references('id')->on('accesorios')
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
        Schema::dropIfExists('pedidos_items');
    }
}
