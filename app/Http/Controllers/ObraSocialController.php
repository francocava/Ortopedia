<?php

namespace App\Http\Controllers;

use App\ObraSocial;
use Illuminate\Http\Request;

class ObraSocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(ObraSocial::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $obraSocial = new ObraSocial();

        $obraSocial->nombre = $request->nombre;

        $obraSocial->save();

        return response()->json($obraSocial);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ObraSocial  $obraSocial
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(ObraSocial::findOrFail($id));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ObraSocial  $obraSocial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ObraSocial $obraSocial)
    {
        $obraSocial->nombre = $request->nombre;

        $obraSocial->save();

        return response()->json($obraSocial);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ObraSocial  $obraSocial
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obraSocial = ObraSocial::findOrFail($id);
        $obraSocial->delete();

        return response()->json($obraSocial);
    }
}
