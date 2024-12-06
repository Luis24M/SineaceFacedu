<?php

namespace App\Http\Controllers;

use App\Models\Estandar;
use App\Models\Criterio;
use App\Models\InfoEstandar;
use MongoDB\BSON\ObjectId;
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
        $infoestandares = InfoEstandar::all();
        $estandares=[];
        foreach($infoestandares as $infoestandar){
            $estandar=Estandar::create([
                'infoestandar'=>new ObjectId($infoestandar->id),
                'contextualizacion',
                'criterios'=>[],
            ]);
             array_push($estandares,$estandar);
        }

        return response()->json($infoestandares);
    }
    
    public function test(){
        $estandar = Estandar::create([
            'contectualziacion',
            'criterios'=>[]
        ]);
        return response()->json($estandar);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $estan = Estandar::where('_id',$id)->first();
        return response()->json($estan);
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
