<?php

namespace App\Http\Controllers;

use App\Models\Subcomite;
use App\Models\Programa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

use Illuminate\Http\Request;

class SubcomiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
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
    public function show(String $subcomite) { 
        $programaNombre = Auth::user()->programa;
        
        $cacheKey = 'programa_subcomites_' . $programaNombre . '_' . Auth::id(); 
        $programa = Cache::remember($cacheKey, 60 * 24, function() use ($programaNombre) { 
            return Programa::where('nombre', $programaNombre)
                ->with(['subcomites' => function($query) {
                    // En MongoDB, simplemente no hacer nada especial
                    // La proyección de campos se maneja diferente
                }])
                ->first(); 
        }); 
    
        $subcomiteKey = 'subcomite_' . $subcomite . '_full'; 
        $fullSubcomite = Cache::remember($subcomiteKey, 60 * 24, function() use ($subcomite) { 
            return Subcomite::with([ 
                'estandares' => function($q) { 
                    $q->with('infoEstandar')
                      ->whereHas('infoEstandar'); 
                } 
            ]) 
            ->where('_id', $subcomite) 
            ->first(); 
        }); 
    
        return view('adminPrograma.subcomite', [ 
            'subcomite' => $fullSubcomite, 
            'programa' => $programa 
        ]); 
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
