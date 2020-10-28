<?php

namespace App\Http\Controllers;

use App\Accesorio;
use App\PedidoItem;
use App\PedidoItemAccesorio;
use Illuminate\Http\Request;

class PedidoItemAccesorioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(PedidoItemAccesorio::all());
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
     * @param  \App\PedidoItemAccesorio  $pedidoItemAccesorio
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(PedidoItemAccesorio::findOrFail($id));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PedidoItemAccesorio  $pedidoItemAccesorio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PedidoItemAccesorio $pedidoItemAccesorio)
    {
        $pedidoItem = PedidoItem::findOrFail($request->pedido_item_id);
        $accesorio = Accesorio::findOrFail($request->accesorio_id);

        $pedidoItem->pedidoItem()->save($pedidoItemAccesorio);
        $accesorio->pedidoItemAccesorio()->save($pedidoItemAccesorio);

        return response()->save($pedidoItemAccesorio);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PedidoItemAccesorio  $pedidoItemAccesorio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pedidoItemAccesorio = PedidoItemAccesorio::findOrFail($id);
        $pedidoItemAccesorio->delete();

        return response()->json($pedidoItemAccesorio);
    }
}
