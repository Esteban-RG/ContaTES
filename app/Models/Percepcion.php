<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Percepcion extends Model
{
    protected $table = 'percepciones';


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
