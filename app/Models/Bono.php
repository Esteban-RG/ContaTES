<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bono extends Model
{
    protected $table = 'bonos';


    // Permitir asignación masiva
    protected $fillable = [
        'descripcion',
        'monto',
    ];


    public function empleados()
    {
        return $this->belongsToMany(Empleado::class)->withTimestamps();
    }
}
