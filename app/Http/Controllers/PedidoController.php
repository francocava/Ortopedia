<?php

namespace App\Http\Controllers;

use App\Pedido;
use App\PedidoItem;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->confirmado != null) {
            return response()->json(Pedido::with(['cliente:id,obra_id,nombre,apellido', 'usuario:id,usuario', 'sucursal'])->where('confirmado', $request->confirmado)->get());
        }

        return response()->json(Pedido::with(['cliente:id,obra_id,nombre,apellido', 'usuario:id,usuario', 'sucursal'])->get());
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
        $importe = 0;


        $pedido->cliente_id = $request->cliente['id'];
        $pedido->sucursal_id = $request->sucursal_id;
        $pedido->usuario_id = $request->usuario_id;
        $pedido->fecha_ingreso_autorizacion = $request->fecha_ingreso_autorizacion;
        $pedido->fecha_retiro = $request->fecha_retiro;
        $pedido->nro_recibo_proveedor = $request->nro_recibo_proveedor;
        $pedido->observaciones = $request->observaciones;
        $pedido->confirmado = $request->confirmado;

        $pedido->save();

        if ($productos && sizeof($productos)) { //es decir, si no esta vacia la lista
            foreach ($productos as $producto) {
                // Aca me tiene que guardar cada producto en pedido_items
                //$producto = Producto::findOrFail($productoNuevo['id']);
                $pedidoItem = new PedidoItem();

                $pedidoItem->pedido_id = $pedido->id;
                $pedidoItem->producto_id = $producto['id'];
                $pedidoItem->precio_item = $producto['precio'];
                $importe += $producto['precio'];
                $pedidoItem->pedido()->associate($pedido);

                $pedidoItem->save();
            }
        }

        if ($accesorios && sizeof($accesorios)) { //si no esta vacia la lista
            foreach ($accesorios as $acc) {
                // y aca cada accesorio en pedido_items
                //$accesorio = Accesorio::findOrFail($acc['id']);
                $pedidoItem = new PedidoItem();

                $pedidoItem->pedido_id = $pedido->id;
                $pedidoItem->accesorio_id = $acc['id'];
                $pedidoItem->precio_item = $acc['precio'];
                $importe += $acc['precio'];
                $pedidoItem->pedido()->associate($pedido);

                $pedidoItem->save();
            }
        }
        $pedido->importe = $importe;
        $pedido->save();

        return response()->json($pedido);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        $pedido->items = $pedido->pedidoItems()->get();

        return response()->json($pedido);
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
        }

        $pedido->delete();

        return response()->json($pedido);
    }
}
