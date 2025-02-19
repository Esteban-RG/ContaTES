<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OtraDeduccion extends Model
{
    protected $table = 'otras_deducciones';


    protected $fillable = [
        'descripcion',
        'tipo',
        'valor',
    ];
}
