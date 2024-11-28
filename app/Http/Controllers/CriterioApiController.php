<?php

namespace App\Http\Controllers;

use App\Models\Criterio;
use App\Models\Evidencia;
use Illuminate\Http\Request;

class CriterioApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $criterios = Criterio::all();
        
        $criteriosConEvidencias = $criterios->map(function($criterio) {
            // Convertir los ObjectIds a un arreglo de strings si es necesario
            $evidenciasIds = array_map(function($id) {
                return (string) $id;
            }, $criterio->evidencias_ids ?? []);
        
            // Buscar las evidencias correspondientes
            $evidencias = Evidencia::whereIn('_id', $evidenciasIds)->get()->keyBy('_id');
            
            // Reemplazar cada ID en evidencias_ids con el documento correspondiente
            $criterioArray = $criterio->toArray();
            $criterioArray['evidencias_ids'] = array_map(function($id) use ($evidencias) {
                return $evidencias[$id] ?? $id; // Si no encuentra la evidencia, deja el ID como está
            }, $evidenciasIds);
            
            return $criterioArray;
        });
    
        return response()->json($criteriosConEvidencias);
    }
    
    public function test(){

        $criterio = Criterio::where('nombre','criterio2')->first();
        return $criterio->_id;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $evidencia1 = Evidencia::create([
                "nombre" => "Evidencia3",
                "enlace" => "Enlace3"
            ]);
            $evidencia2 = Evidencia::create([
                "nombre" => "Evidencia4",
                "enlace" => "Enlace4"
            ]);
    
            // Depuración
            \Log::info('Evidencia1 ID: ' . $evidencia1->id);
            \Log::info('Evidencia2 ID: ' . $evidencia2->id);
    
            $criterio = Criterio::create([
                'nombre' => 'criterio2',
                'evidencias_ids' => [$evidencia1->id, $evidencia2->id]
            ]);
    
            // Más depuración
            \Log::info('Criterio creado: ', $criterio->toArray());
    
            return response()->json($criterio);
        } catch (\Exception $e) {
            // Capturar cualquier error
            \Log::error('Error al crear criterio: ' . $e->getMessage());
            return response()->json([
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ], 500);
        }
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
    public function show(Criterio $criterio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Criterio $criterio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Criterio $criterio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Criterio $criterio)
    {
        //
    }
}
