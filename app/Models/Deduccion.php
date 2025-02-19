<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deduccion extends Model
{
    protected $table = 'deducciones';


    // Permitir asignación masiva
    protected $fillable = [
        'nombre',
        'valor',
    ];

    public function nomina()
    {
        return $this->belongsTo(Nomina::class)->withTimestamps();
    }
}
