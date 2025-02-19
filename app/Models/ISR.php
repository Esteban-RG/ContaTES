<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ISR extends Model
{
    protected $table = 'tarifa_isr';


    // Permitir asignación masiva
    protected $fillable = [
        'limite_inferior',
        'limite_superior',
        'cuota_fija',
        'porcentaje_aplicable',
    ];

}
