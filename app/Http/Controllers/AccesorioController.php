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
        return response()->json(Accesorio::all());
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
        $productos = explode(',',$request->productos);

        $accesorio->nroArticulo = $request->nroArticulo;
        $accesorio->descripcion = $request->descripcion;
        $accesorio->precio = $request->precio;

        foreach($productos as $producto_id) {
            $accesorio->producto()->attach($producto_id);
        }

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
    public function show($id)
    {
        return response()->json(Accesorio::findOrFail($id));
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
        // $user->roles()->detach(); //puede ser rol si le pones uno especifico (esto lo saque de la docu)
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Accesorio  $accesorio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $accesorio = Accesorio::findOrFail($id);
        $accesorio->delete();

        return response()->json($accesorio);
    }
}
