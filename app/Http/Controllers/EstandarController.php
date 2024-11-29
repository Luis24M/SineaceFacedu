<?php

namespace App\Http\Controllers;

use App\Models\Estandar;
use App\Models\Contextualizacion;
use App\Models\Narrativa;
use Illuminate\Http\Request;
use App\Models\Subcomite;
use Illuminate\Support\Facades\Auth;

class EstandarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private function getSubcomite()
    {
        return Subcomite::where('nombre', Auth::user()->subcomite)->first();
    }

    private function getNarrativa($id)
    {
        return Narrativa::where('id', $id)->first();
    }

    private function getContextualizacion($id)
    {
        return Contextualizacion::where('id', $id)->first();
    }
    

    public function index(Estandar $estandar)
    {   
        $subcomite = $this->getSubcomite();
        $estandares = Estandar::whereIn('id', $subcomite->estandares)->get();
        $contextualizacion = $this->getContextualizacion($estandar->contextualizacion);
        $narrativa = $this->getNarrativa($contextualizacion->narrativa);
        return view('usuario.contextualizacion', compact('subcomite', 'estandares', 'estandar', 'contextualizacion', 'narrativa'));
    }

    public function actualizarNarrativaPrograma(Estandar $estandar, Request $request)
    {
        $request->validate([
            'programa' => ['nullable', 'string'],
        ]);
        $contextualizacion = $this->getContextualizacion($estandar->contextualizacion);
        $narrativa = $this->getNarrativa($contextualizacion->narrativa);
        $narrativa->misionPrograma = request('programa');
        $narrativa->save();
        return redirect()->back()->with('success', 'Narrativa actualizada correctamente');
    }

    public function actualizarNarrativaDescripcion(Estandar $estandar, Request $request)
    {
        $request->validate([
            'problematica' => ['nullable', 'string'],
        ]);
        $contextualizacion = $this->getContextualizacion($estandar->contextualizacion);
        $narrativa = $this->getNarrativa($contextualizacion->narrativa);
        $narrativa->problematica = request('problematica');
        $narrativa->save();
        return redirect()->back()->with('success', 'Narrativa actualizada correctamente');
    }


    public function actualizarNarrativaP(Estandar $estandar)
    {
        $subcomite = $this->getSubcomite();
        $estandares = Estandar::whereIn('id', $subcomite->estandares)->get();
        // Actualizar narrativa
        $contextualizacion->narrativa = request('narrativa');
        $contextualizacion->save();

        return view('usuario.contextualizacion', compact('subcomite', 'estandar', 'contextualizacion'));
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
