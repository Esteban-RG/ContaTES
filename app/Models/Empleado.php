<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleados';


    // Permitir asignación masiva
    protected $fillable = [
        'matricula',
        'fecha_ingreso',
        'plaza_id',
        'curp',
        'rfc',
        'nss',
        'persona_id',
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'persona_id', 'id');
    }

    public function bonos()
    {
        return $this->belongsToMany(Bono::class)->withTimestamps();
    }

    public function plaza()
    {
        return $this->belongsTo(Plaza::class);
    }

    public function nominas()
    {
        return $this->hasMany(Nomina::class);
    }

    public function permisos()
    {
        return $this->hasMany(Permiso::class);
    }
}
