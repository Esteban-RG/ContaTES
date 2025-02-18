<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'personas';


    // Permitir asignación masiva
    protected $fillable = [
        'nombre',
        'ap_paterno',
        'ap_materno',
        'correo',
        'telefono',
        'genero',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function empleado()
    {
        return $this->hasOne(Empleado::class, 'persona_id', 'id');
    }
}
