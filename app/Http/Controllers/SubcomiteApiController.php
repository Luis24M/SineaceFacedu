<?php

namespace App\Http\Controllers;

use App\Models\Subcomite;
use Illuminate\Http\Request;

class SubcomiteApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $subcomites = Subcomite::all();
        return response()->json($subcomites);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $subcomite=Subcomite::create([
            'nombre'=>'admin',
            'estandares'=>[]
        ]);
        return response()->json();
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
    public function show(Subcomite $subcomite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subcomite $subcomite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subcomite $subcomite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subcomite $subcomite)
    {
        //
    }
}
