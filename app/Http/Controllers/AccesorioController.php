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
        return response()->json(Accesorio::with(['proveedor'])->get());
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
        $productos = $request->productos;

        $accesorio->nro_articulo = $request->nro_articulo;
        $accesorio->nombre = $request->nombre;
        $accesorio->precio = $request->precio;
        $accesorio->descripcion = $request->descripcion;

        $accesorio->proveedor()->associate($proveedor);
        $accesorio->save();

        /*
        if ($productos && sizeof($productos)) foreach ($productos as $producto_id) {
            $accesorio->productos()->attach($producto_id);
        }
        */

        foreach ($productos as $producto) {
            $accesorio->productos()->attach($producto['id']);
        }

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
        $accesorio->productos= $accesorio->productos()->get();
        
        return response()->json($accesorio);
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
        logger($request);
        // $user->roles()->detach(); //puede ser rol si le pones uno especifico (esto lo saque de la docu)
        $proveedor = Proveedor::findOrFail($request->proveedor_id);
        $productos = $request->productos;
        //$productos = explode(",",$request->productos);
        $accesorio->nro_articulo = $request->nro_articulo;
        $accesorio->nombre = $request->nombre;
        $accesorio->precio = $request->precio;
        $accesorio->descripcion = $request->descripcion;
        $proveedor->accesorios()->save($accesorio);

        $accesorio->productos()->detach(); //Le saca los productos
        $accesorio->save();
        
        foreach ($productos as $producto) {
            $accesorio->productos()->attach($producto['id']);
        }

        return response()->json($accesorio);

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
        $accesorio->productos()->detach(); //Le saca los productos
        $accesorio->delete();

        return response()->json($accesorio);
    }
}
