<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $table = 'permisos';


    // Permitir asignación masiva
    protected $fillable = [
        'descripcion',
        'fecha',
        'estado',
        'empleado_id',
    ];

    public function empleado()
    {
        return $this->belongsTo(Nomina::class)->withTimestamps();
    }
}
