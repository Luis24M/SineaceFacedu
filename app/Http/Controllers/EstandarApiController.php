<?php

namespace App\Http\Controllers;

use App\Models\Estandar;
use App\Models\Criterio;
use Illuminate\Http\Request;

class EstandarApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $estandares = Estandar::all();
        return response()->json($estandares);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener los criterios
        $criterio1 = Criterio::where('nombre', 'criterio1')->first();
        $criterio2 = Criterio::where('nombre', 'criterio2')->first();
    
        // Asegurarte de convertir los IDs a ObjectId si es necesario
        $Estandar = Estandar::create([
            'titulo' => 'Estandar1',
            'factor' => 'factor1',
            'dimension' => 'dimension1',
            'descripcion' => 'Estandar1',
            'criterios' => [
                new \MongoDB\BSON\ObjectId($criterio1->id),
                new \MongoDB\BSON\ObjectId($criterio2->id)
            ]
        ]);
    
        return response()->json($Estandar);
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
    public function show(Estandar $estandar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estandar $estandar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Estandar $estandar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estandar $estandar)
    {
        //
    }
}
