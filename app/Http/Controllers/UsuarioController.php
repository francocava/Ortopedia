<?php

namespace App\Http\Controllers;

use App\Usuario;
use App\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Usuario::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario = new Usuario();
        $rol = Rol::findOrFail($request->rol_id);

        $usuarioNuevo = substr($request->nombre, 0, -strlen($request->nombre) + 1);
        $usuarioNuevo = strtolower($usuarioNuevo) . ($request->apellido);
        //Me genera el nombre de usuario por ej: Nico Perez => nPerez

        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->usuario = $usuarioNuevo;
        $usuario->password = Hash::make('123456'); //password por defecto, despues se cambia

        $usuario->rol()->associate($rol);
        $usuario->save();

        return response()->json($usuario);
    }

    public function show($id)
    {
        return response()->json(Usuario::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        $rol = Rol::findOrFail($request->rol_id);

        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->usuario = $request->usuario;
        $usuario->password = $request->password;

        $rol->usuario()->save($usuario);

        return response()->json($usuario);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return response()->json($usuario);
    }
}
