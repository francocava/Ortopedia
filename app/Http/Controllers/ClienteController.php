<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\ObraSocial;
use Facade\FlareClient\Http\Client;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Cliente::all());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente = new Cliente();

        $obraSocial = ObraSocial::findOrFail($request->obra_id);

        $cliente->nombre = $request->nombre;
        $cliente->apellido = $request->apellido;
        $cliente->dni = $request->dni;
        $cliente->contacto = $request->contacto;
        $cliente->telefono = $request->telefono;
        $cliente->nroAfiliado = $request->nroAfiliado;

        $obraSocial->clientes()->save($cliente);

        return response()->json($cliente);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Cliente::findOrFail($id));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Cliente $cliente)
    {
        $obraSocial = ObraSocial::findOrFail($request->obra_id);

        $cliente->nombre = $request->nombre;
        $cliente->nombre = $request->nombre;
        $cliente->apellido = $request->apellido;
        $cliente->dni = $request->dni;
        $cliente->contacto = $request->contacto;
        $cliente->telefono = $request->telefono;
        $cliente->nroAfiliado = $request->nroAfiliado;

        $obraSocial->clientes()->save($cliente);

        return response()->json($cliente);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return response()->json($cliente);
    }
}
