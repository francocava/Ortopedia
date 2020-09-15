<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoItemAccesoriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_item_accesorios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pedido_item_id');
            $table->foreignId('accesorio_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('pedido_item_id')
                ->references('id')->on('pedido_items')
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
        Schema::dropIfExists('pedido_item_accesorios');
    }
}
