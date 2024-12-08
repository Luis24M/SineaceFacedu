<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\BelongsTo;

class Criterio extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'criterios';
    
    protected $fillable = [
        'nombre',
        'evidencias_ids'
    ];

    public function estandar():BelongsTo{
        return $this->belogsTo(Estandar::class);
    }

    public function setEvidenciasIdsAttribute($value)
    {
        if (is_array($value)) {
            $this->attributes['evidencias_ids'] = array_map(function($id) {
                return $id instanceof ObjectId ? $id : new ObjectId($id);
            }, $value);
        }
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
