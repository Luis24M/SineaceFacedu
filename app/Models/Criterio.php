<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\BSON\ObjectId;

class Criterio extends Model
{
    protected $connection = 'mongodb';
    
    protected $fillable = [
        'nombre',
        'evidencias_ids'
    ];

    public function setEvidenciasIdsAttribute($value)
    {
        if (is_array($value)) {
            $this->attributes['evidencias_ids'] = array_map(function($id) {
                return $id instanceof ObjectId ? $id : new ObjectId($id);
            }, $value);
        }
    }

    public function evidencias(){
        return $this->belongToMany(Evidencia::class, null , 'criterios_ids', 'evidencia_ids');
    }


    public function agregarEvidencia(Evidencia $evidencia)
    {
        $evidencias_ids = $this->evidencias_ids ?? [];
        
        // Evitar duplicados
        if (!in_array($evidencia->_id, $evidencias_ids)) {
            $evidencias_ids[] = $evidencia->_id;
            $this->evidencias_ids = $evidencias_ids;
            $this->save();
        }
    }

    public function eliminarEvidencia(Evidencia $evidencia)
    {
        $evidencias_ids = $this->evidencias_ids ?? [];
        
        $this->evidencias_ids = array_values(array_filter($evidencias_ids, function($id) use ($evidencia) {
            return $id != $evidencia->_id;
        }));
        
        $this->save();
    }

}
