<?php

namespace App\Http\Controllers;

use App\Accesorio;
use App\Producto;
use App\Proveedor;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Producto::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = new Producto();
        $proveedor = Proveedor::findOrFail($request->proveedor_id);

        $accesorios = $request->accesorios;
        $producto->nro_articulo = $request->nro_articulo;
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;

        $producto->proveedor()->associate($proveedor);
        $producto->save();

        foreach ($accesorios as $accesorio_id) {
            $producto->accesorio()->attach($accesorio_id);
        }

        return response()->json($producto);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Producto::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $proveedor = Proveedor::findOrFail($request->proveedor_id);

        //$accesorios = $request->accesorios;
        $producto->nro_articulo = $request->nro_articulo;
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        //$producto->accesorio()->detach(); //deberia sacarle todos sus accesorios

        /*
        foreach($accesorios as $accesorio_id) {
            $producto->accesorio()->attach($accesorio_id); //le pone los nuevos
        }
        */ //Aca hay algo mal

        $proveedor->producto()->save($producto);
        $producto->save();

        return response()->json($producto);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return response()->json($producto);
    }
}
