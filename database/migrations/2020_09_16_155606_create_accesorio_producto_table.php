<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccesorioProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accesorio_producto',function(Blueprint $table) {
            $table->id();
            $table->foreignId('accesorio_id');
            $table->foreignId('producto_id');
            $table->unique(['accesorio_id','producto_id']);

            $table->foreign('accesorio_id')
                    ->references('id')->on('accesorios')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('producto_id')
                    ->references('id')->on('productos')
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
        Schema::dropIfExists('accesorio_producto');
    }
}
