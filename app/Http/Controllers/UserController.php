<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subcomite;

class UserController extends Controller
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
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        
        // Datos para actualizar
        $data = $request->only([
            'name', 
            'lastname', 
            'email', 
            'dni', 
            'programa'
        ]);
    
        // Si se proporciona un nuevo subcomité
        if ($request->has('subcomite')) {
            // Encuentra el nuevo subcomité
            $nuevoSubcomite = Subcomite::findOrFail($request->subcomite);
            
            // Elimina el usuario del subcomité anterior (si existe)
            if ($user->subcomite) {
                $subcomiteAnterior = Subcomite::where('nombre', $user->subcomite)->first();
                if ($subcomiteAnterior) {
                    $subcomiteAnterior->usuarios()->detach($user->id);
                }
            }
    
            // Adjunta al nuevo subcomité
            $nuevoSubcomite->usuarios()->attach($user->id);
    
            // Actualiza el nombre del subcomité en el usuario
            $data['subcomite'] = $nuevoSubcomite->nombre;
        }
    
        // Actualiza el usuario
        $user->update($data);
    
        return redirect()->route('usuario.home')->with('success', 'Usuario actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Encuentra el usuario
        $user = User::findOrFail($id);

        // Si el usuario está en un subcomité, elimina la relación
        if ($user->subcomite) {
            $subcomite = Subcomite::where('nombre', $user->subcomite)->first();
            
            if ($subcomite) {
                // Elimina la referencia del usuario en el subcomité
                $subcomite->usuarios()->detach($user->id);
            }
        }

        // Elimina el usuario
        $user->delete();

        return redirect()->route('usuario.home')
            ->with('success', 'Usuario eliminado correctamente');
    }
}
