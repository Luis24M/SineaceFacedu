<?php

namespace App\Http\Controllers;

use App\Models\Programa;
use App\Models\User;
use Illuminate\Http\Request;

class ProgramaApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        #$programa=Programa::with('adminPrograma')->first();
        $programa=Programa::first();
        $admin=$programa->adminPrograma;

        return response()->json($admin);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $user = User::create([
            'name'=>'admin',
            'lastname'=>'admin',
            'dni'=>'1111',
            'email'=>'admin@gmail.com',
            'password'=>'1111',
            'rol'=>'admin',
        ]);

        $programa=Programa::create([
            'nombre'=>'PROGRAMA 1'
        ]);

        $programa->adminPrograma()->save($user);

        return response()->json($programa);
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
