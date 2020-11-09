<?php

namespace App\Http\Controllers;

use App\Factura;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Factura::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $factura = new Factura();

        $factura->total_sin_iva = $request->total_sin_iva;
        $factura->total_con_iva = $request->total_con_iva;
        $factura->fecha_fac = $request->fecha_fac;
        $factura->importe = $request->importe;
        $factura->fl_ct = $request->fl_ct;

        return response()->json($factura);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Factura::findOrFail($id));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Factura $factura)
    {
        $factura->total_sin_iva = $request->total_sin_iva;
        $factura->total_con_iva = $request->total_con_iva;
        $factura->fecha_fac = $request->fecha_fac;
        $factura->importe = $request->importe;
        $factura->fl_ct = $request->fl_ct;

        $factura->save();

        return response()->json($factura);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $factura = Factura::findOrFail($id);
        $factura->delete();

        return response()->json($factura);
    }
}
