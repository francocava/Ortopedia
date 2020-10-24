<?php

namespace App\Http\Controllers;

use App\Accesorio;
use App\Pedido;
use App\PedidoItem;
use App\Producto;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pedido = new Pedido();

        //for each...
        $producto = Producto::findOrFail($request->prod_id);
        $accesorio = Accesorio::findOrFail($request->acc_id);

        $pedido->fecha_ingreso_aut = $request->fecha_ingreso_aut;

        $pedidoItem = new PedidoItem();
        $pedidoItem->producto_id = $producto->id;
        $pedidoItem->precio = $producto->precio;

        //for each accesorios 

        //


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        //
    }
}
