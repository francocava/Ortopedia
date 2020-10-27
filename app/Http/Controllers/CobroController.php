<?php

namespace App\Http\Controllers;

use App\Cobro;
use App\Pedido;
use App\FormaPago;
use Illuminate\Http\Request;

class CobroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Cobro::all());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cobro = new Cobro();
        $pedido = Pedido::findOrFail($request->pedido_id);
        $formaPago = FormaPago::findOrFail($request->forma_pago_id);

        $cobro->monto = $request->monto;

        $cobro->pedido()->associate($pedido);
        $cobro->formaPago()->associate($formaPago);
        $cobro->save();

        return response()->json($cobro);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cobro  $cobro
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Cobro::findOrFail($id));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cobro  $cobro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cobro $cobro)
    {
        $pedido = Pedido::findOrFail($request->pedido_id);
        $formaPago = FormaPago::findOrFail($request->forma_pago_id);

        $cobro->monto = $request->monto;

        $pedido->cobro()->save($cobro);
        $formaPago->cobro()->save($cobro);

        return response()->json($cobro);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cobro  $cobro
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cobro = Cobro::findOrFail($id);
        $cobro->delete();

        return response()->json($cobro);
    }
}
