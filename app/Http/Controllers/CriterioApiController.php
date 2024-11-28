<?php

namespace App\Http\Controllers;

use App\Models\Criterio;
use App\Models\Evidencia;
use Illuminate\Http\Request;

class CriterioApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $criterios = Criterio::All();
        return response()->json($criterios);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $evidencia1 = Evidencia::create([
            "nombre"=>"Evidencia3",
            "enlace"=>"Enlace1"
        ]);
        $evidencia2 = Evidencia::create([
            "nombre"=>"Evidencia4",
            "enlace"=>"Enlace2"
        ]);

        $criterio = Criterio::create([
            'nombre'=>'criterio1',
            'evidencias_ids'=>[$evidencia1->_id,$evidencia2->_id]
        ]);

        return response()->json($criterio);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Criterio $criterio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Criterio $criterio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Criterio $criterio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Criterio $criterio)
    {
        //
    }
}
