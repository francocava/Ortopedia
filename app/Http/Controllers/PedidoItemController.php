<?php

namespace App\Http\Controllers;

use App\Pedido;
use App\PedidoItem;
use App\Producto;
use Illuminate\Http\Request;

class PedidoItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(PedidoItem::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*
    public function store(Request $request)
    {
        No hace falta el store ya que se hace en PedidoController
    }
    */

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(PedidoItem::findOrFail($id));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PedidoItem  $pedidoItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PedidoItem $pedidoItem)
    {
        $pedido = Pedido::findOrFail($request->pedido_id);
        $item = null;
        if($request->producto_id){
            $item = Producto::findOrFail($request->producto_id); //es decir, si es un producto
        } else {
            $item = Producto::findOrFail($request->accesorio_id);
        }

        $pedidoItem->precio = $item->precio;
        $pedidoItem->porcentajeOS = $request->porcentajeOS;

        $pedido->pedidoItem()->save($pedidoItem);
        $item->pedidoItem()->save($pedidoItem);


        return response()->json($pedidoItem);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PedidoItem  $pedidoItem
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pedidoItem = PedidoItem::findOrFail($id);
        $pedidoItem->delete();

        return response()->json($pedidoItem);
    }
}
