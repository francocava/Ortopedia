<?php

namespace App\Http\Controllers;

use App\Accesorio;
use App\Pedido;
use App\PedidoItem;
use App\PedidoItemAccesorio;
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
        return response()->json(Pedido::all());
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

        /* Me parece que lo mejor que podemos hacer aca es olvidarnos de los accesorios
           y pensarlos como productos. Tenerlos anidados nos trae muchas complicaciones y
           no necesariamente coincide con la realidad. De esta forma una persona no puede comprar
           un accesorio unicamente o llevar un producto y un accesorio que no coincide.
           Tambien nos haria la vida mucho mas facil jaja 
           De ultima podemos seguir separando los accesorios de los productos pero sin relacionarlos
        */

        foreach ($productos as $producto_id) {
            // Aca me tiene que guardar cada producto en pedido_items
            $producto = Producto::findOrFail($producto_id);
            $pedidoItem = new PedidoItem();
            $pedidoItem->producto_id = $producto->id;
            $pedidoItem->precio = $producto->precio;

            foreach ($accesorios as $acc_id) {
                // y aca cada accesorio en pedido_item_accesorios
                // cada pedido_item_accesorio se corresponde con un pedido_item especifico y 
                // no se relaciona directamente con el pedido
                $accesorio = Accesorio::findOrFail($acc_id);
                $pedido_item_accesorio = new PedidoItemAccesorio();

                $pedido_item_accesorio->pedido_item_id = $pedidoItem->id;
                $pedido_item_accesorio->accesorio_id = $accesorio->id;
            }
        }

        $pedido->clie_id = $request->clie_id;
        $pedido->suc_id = $request->suc_id;
        $pedido->estado_id = $request->estado_id;
        $pedido->usuario_id = $request->usuario_id;
        $pedido->fac_id = $request->fac_id;
        $pedido->fecha_ingreso_autorizacion = $request->fecha_ingreso_autorizacion;
        $pedido->fecha_retiro = $request->fecha_retiro;
        $pedido->importe_fac = $request->importe_fac;
        $pedido->fl_ct = $request->fl_ct;
        $pedido->nro_recibo_proveedor = $request->nro_recibo_proveedor;
        $pedido->cancelado = $request->cancelado;
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
        $productos = explode(',', $request->productos);
        $accesorios = explode(',', $request->accesorios);

        //Para modificar un pedido_item y un pedido_item_accesorio hay que ir a su correspondiente controller

        $pedido->clie_id = $request->clie_id;
        $pedido->suc_id = $request->suc_id;
        $pedido->estado_id = $request->estado_id;
        $pedido->usuario_id = $request->usuario_id;
        $pedido->fac_id = $request->fac_id;
        $pedido->fecha_ingreso_autorizacion = $request->fecha_ingreso_autorizacion;
        $pedido->fecha_retiro = $request->fecha_retiro;
        $pedido->importe_fac = $request->importe_fac;
        $pedido->fl_ct = $request->fl_ct;
        $pedido->nro_recibo_proveedor = $request->nro_recibo_proveedor;
        $pedido->cancelado = $request->cancelado;
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
        $pedido->delete();

        return response()->json($pedido);
    }
}
