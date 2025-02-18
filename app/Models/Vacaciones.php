<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vacaciones extends Model
{
    protected $table = 'vacaciones';

    protected $fillable = [
        'dia_no_laboral',
        'descripcion',
    ];
}
