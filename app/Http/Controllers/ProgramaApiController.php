<?php

namespace App\Http\Controllers;

use App\Models\Programa;
use Illuminate\Http\Request;

class ProgramaApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        #$programas = Programa::with('usuario')->get();
        #return response()->json($programas);
        $programas = Programa::where();
        $subcomites=[];
        foreach($programas as $programa){
            foreach($programas->subcomites as $subcomite){
                $obSubcomite = Subcomite::where('id',$subcomite->id);
                array_push($subcomites,$obSubcomite);
            }
            
        }
        return response()->json($subcomites);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Programa $programa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Programa $programa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Programa $programa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Programa $programa)
    {
        //
    }
}
