<?php

namespace App\Http\Controllers;

use App\Models\Estandar;
use Illuminate\Http\Request;
use App\Models\Subcomite;
use Illuminate\Support\Facades\Auth;

class EstandarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(String $estandar)
    {   
        $estandar = Estandar::where('nombre', $estandar)->first();
        $subcomite = Subcomite::where('nombre', Auth::user()->subcommittee)->first();
        return view('usuario.contextualizacion', compact('subcomite', 'estandar'));
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
