<?php

namespace App\Http\Controllers;

use App\Accesorio;
use App\Pedido;
use App\PedidoItem;
use App\PedidoItemAccesorio;
use App\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Pedido::with(['cliente:id,obra_id,nombre,apellido','usuario:id,usuario','sucursal'])->get());
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
        $productos = $request->productos;
        $accesorios = $request->accesorios;

        $pedido->cliente_id = $request->cliente['id'];
        $pedido->sucursal_id = $request->sucursal_id;
        $pedido->usuario_id = $request->usuario_id;
        $pedido->importe = $request->importe;
        $pedido->fecha_ingreso_autorizacion = $request->fecha_ingreso_autorizacion;
        $pedido->fecha_retiro = $request->fecha_retiro;
        $pedido->nro_recibo_proveedor = $request->nro_recibo_proveedor;
        $pedido->observaciones = $request->observaciones;
        $pedido->confirmado = $request->confirmado;

        $pedido->save();

        if ($productos && sizeof($productos)) { //es decir, si no esta vacia la lista
            foreach($productos as $producto) {
                // Aca me tiene que guardar cada producto en pedido_items
                //$producto = Producto::findOrFail($productoNuevo['id']);
                $pedidoItem = new PedidoItem();

                $pedidoItem->pedido_id = $pedido->id;
                $pedidoItem->producto_id = $producto['id'];
                $pedidoItem->precio_item = $producto['precio'];

                $pedidoItem->pedido()->associate($pedido);

                $pedidoItem->save();
            }
        }

        if ($accesorios && sizeof($accesorios)) { //si no esta vacia la lista

            foreach($accesorios as $acc) {
                // y aca cada accesorio en pedido_items
                //$accesorio = Accesorio::findOrFail($acc['id']);
                $pedidoItem = new PedidoItem();

                $pedidoItem->pedido_id = $pedido->id;
                $pedidoItem->accesorio_id = $acc['id'];
                $pedidoItem->precio_item = $acc['precio'];

                $pedidoItem->pedido()->associate($pedido);

                $pedidoItem->save();
            }
        }

        return response()->json($pedido);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Pedido::findOrFail($id));
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
        //Para modificar un pedido_item hay que ir a su correspondiente controller
        $pedido->cliente_id = $request->cliente_id;
        $pedido->sucursal_id = $request->sucursal_id;
        $pedido->importe = $request->importe;
        $pedido->usuario_id = $request->usuario_id;
        $pedido->fecha_ingreso_autorizacion = $request->fecha_ingreso_autorizacion;
        $pedido->fecha_retiro = $request->fecha_retiro;
        $pedido->nro_recibo_proveedor = $request->nro_recibo_proveedor;
        $pedido->observaciones = $request->observaciones;
        $pedido->confirmado = $request->confirmado;

        $pedido->save();

        return response()->json($pedido);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pedido = Pedido::findOrFail($id);

        foreach ($pedido->pedidoItems as $item) {
            $item->delete();
            $item->delete();
            $item->delete();
        }

        $pedido->delete();

        return response()->json($pedido);
    }
}
