<?php

namespace App\Http\Controllers;

use App\Accesorio;
use App\Proveedor;
use Illuminate\Http\Request;

class AccesorioController extends Controller
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
        $accesorio = new Accesorio();
        $proveedor = Proveedor::findOrFail($request->proveedor_id);

        $accesorio->nroArticulo = $request->nroArticulo;
        $accesorio->descripcion = $request->descripcion;
        $accesorio->precio = $request->precio;

        $accesorio->proveedor()->associate($proveedor);
        $accesorio->save();

        return response()->json($accesorio);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Accesorio  $accesorio
     * @return \Illuminate\Http\Response
     */
    public function show(Accesorio $accesorio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Accesorio  $accesorio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Accesorio $accesorio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Accesorio  $accesorio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accesorio $accesorio)
    {
        //
    }
}
