<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('clientes', function (Blueprint $table) {
                $table->id();
                $table->foreignId('obra_id');
                $table->string('nombre');
                $table->string('apellido');
                $table->string('dni');
                $table->string('telefono');
                $table->string('nroAfiliado');
                $table->timestamps();
                $table->softDeletes();
    
                
                $table->foreign('obra_id')
                    ->references('id')->on('obras_sociales')
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
        Schema::dropIfExists('clientes');
    }
}
