<?php

namespace App\Http\Controllers;

use App\Models\Contextualizacion;
use Illuminate\Http\Request;

class ContextualizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(String $nombre)
    {

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
    public function show(Contextualizacion $contextualizacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contextualizacion $contextualizacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contextualizacion $contextualizacion)
    {
        $data = $request->validate([
            'nombre' => 'required',
        ]);

        $contextualizacion->brec = $data['nombre'];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contextualizacion $contextualizacion)
    {
        //
    }
}
