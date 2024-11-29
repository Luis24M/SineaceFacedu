<?php

namespace App\Http\Controllers;
use MongoDB\BSON\ObjectId;
use App\Models\Subcomite;
use App\Models\Estandar;
use App\Models\User;
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

        $user = User::where('name','user1')->first();
        $estandar = Estandar::where('titulo','Estandar1')->first();
        $subcomite = Subcomite::create([
            'nombre'=>'subcomite1',
            'usuarios'=>[ new ObjectId($user->id)],
            'estandares'=>[new ObjectId($estandar->id)]
        ]);

        return response()->json($subcomite);
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
