<?php

namespace App\Http\Controllers;

use App\Models\Estandar;
use App\Models\Contextualizacion;
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
        return Subcomite::where('nombre', Auth::user()->subcommittee)->first();
    }


    public function index(String $estandar)
    {   
        $estandar = Estandar::where('nombre', $estandar)->first();
        $subcomite = $this->getSubcomite();
        $contextualizacion = Contextualizacion::where('id', $estandar->contextualizacion)->first();
        return view('usuario.contextualizacion', compact('subcomite', 'estandar', 'contextualizacion'));
    }

    public function narrativa(String $estandar)
    {
        $estandar = Estandar::where('nombre', $estandar)->first();
        $subcomite = $this->getSubcomite();
        $contextualizacion = Contextualizacion::where('id', $estandar->contextualizacion)->first();
        dd($contextualizacion, $estandar, $subcomite);
        return view('usuario.contextualizacion', compact('subcomite', 'estandar', 'contextualizacion'));
    }
    public function actualizarNarrativa(String $estandar)
{
    // Buscar el estándar por nombre
    $estandar = Estandar::where('nombre', $estandar)->first();
    if (!$estandar) {
        abort(404, 'Estandar no encontrado');
    }

    // Buscar la contextualización por el campo 'id'
    $contextualizacion = Contextualizacion::where('id', $estandar->contextualizacion)->first();
    dd($contextualizacion);
    if (!$contextualizacion) {
        abort(404, 'Contextualización no encontrada');
    }

    // Actualizar narrativa
    $contextualizacion->narrativa = request('narrativa');
    $contextualizacion->save();

    $subcomite = $this->getSubcomite();

    // Retornar la vista actualizada
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
