<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plaza extends Model
{
    protected $table = 'plazas';


    // Permitir asignación masiva
    protected $fillable = [
        'nombre',
        'sueldo',
    ];

    public function empleado()
    {
        return $this->hasMany(Empleado::class);
    }
}
