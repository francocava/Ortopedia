<?php

namespace App\Http\Controllers;

use App\Accesorio;
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
        return response()->json(PedidoItem::has('pedido')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //   No hace falta el store ya que se hace en PedidoController
    // }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(PedidoItem::findOrFail($id)->has('pedido')->first());
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

        if ($request->producto_id) {
            $item = Producto::findOrFail($request->producto_id);
        } else {
            $item = Accesorio::findOrFail($request->accesorio_id);
        }

        $pedidoItem->precio_item = $request->precio_item;
        $pedidoItem->porcentaje_os = $request->porcentaje_os;
        $pedidoItem->cantidad = $request->cantidad;
        $pedido->pedidoItems()->save($pedidoItem);
        $item->pedidoItems()->save($pedidoItem);

        $pedidoItem->save();


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
