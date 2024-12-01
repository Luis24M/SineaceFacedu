<?php

namespace App\Http\Controllers;
use App\Models\Problematica;
use App\Models\Narrativa;
use App\Models\Contextualizacion;
use MongoDB\BSON\ObjectId;
use Illuminate\Http\Request;

class ProblematicaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request, Narrativa $narrativa, Contextualizacion $contextualizacion)
    {
        $data = $request->validate([
            'nombre' => 'required',
            'description' => 'required'
        ]);

        $problematica = new Problematica($data);
        $problematica->save();
        // agregar el nombre de la problematica al campo de brechas de contextualizacion, el campo brechas es un array de strings
        $contextualizacion->brechas = array_merge($contextualizacion->brechas, [$problematica->nombre]);
        $contextualizacion->save();
        // agregar el oid de la problematica al campo de problematicas de narrativa
        $narrativa->problematicas = array_merge($narrativa->problematicas, [new ObjectId($problematica->id)]); 
        $narrativa->save();
        return redirect()->back()->with('success', 'Problematica creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Problematica $problematica)
    {
        $data = $request->validate([
            'nombre' => 'required',
        ]);

        $problematica->update($data);
        return redirect()->back()->with('success', 'Problematica actualizada correctamente');        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
