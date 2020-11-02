<?php

use App\Accesorio;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proveedor_id');
            $table->string('nombre');
            $table->float('precio')->nullable();
            $table->integer('nroArticulo')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('proveedor_id')
                    ->references('id')->on('proveedores')
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
        Schema::dropIfExists('productos');
    }
}
