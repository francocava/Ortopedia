<?php

namespace App\Http\Controllers;

use App\FormaPago;
use Illuminate\Http\Request;

class FormaPagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(FormaPago::all());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formaPago = new FormaPago();

        $formaPago->tipo = $request->tipo;

        $formaPago->save();

        return response()->json($formaPago);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FormaPago  $formaPago
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(FormaPago::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FormaPago  $formaPago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FormaPago $formaPago)
    {
        $formaPago->tipo = $request->tipo;

        $formaPago->save();

        return response()->json($formaPago);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FormaPago  $formaPago
     * @return \Illuminate\Http\Response
     */
    public function destroy(FormaPago $formaPago)
    {
        return response()->json($formaPago->delete());
    }
}
