<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nomina extends Model
{
    protected $table = 'nominas';


    // Permitir asignación masiva
    protected $fillable = [
        'fecha_inicio',
        'fecha_fin',
        'salario_bruto',
        'salario_neto',
        'empleado_id',
    ];


    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }

    public function percepciones()
    {
        return $this->hasMany(Percepcion::class);
    }

    public function deducciones()
    {
        return $this->hasMany(Deduccion::class);
    }
}
