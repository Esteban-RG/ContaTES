<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PlazasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Datos de las plazas
        $plazas = [
            ['nombre' => 'DIRECTOR GENERAL', 'sueldo' => 23344.49],
            ['nombre' => 'DIRECTOR DE ÁREA', 'sueldo' => 20655.625],
            ['nombre' => 'CONTRALOR INTERNO', 'sueldo' => 18486.35],
            ['nombre' => 'SUBDIRECTOR', 'sueldo' => 18486.35],
            ['nombre' => 'JEFE DE DIVISIÓN', 'sueldo' => 15977.625],
            ['nombre' => 'JEFE DE DEPARTAMENTO', 'sueldo' => 11327.5],
            ['nombre' => 'LABORATORISTA', 'sueldo' => 3453.85],
            ['nombre' => 'INGENIERO EN SISTEMAS', 'sueldo' => 5661.425],
            ['nombre' => 'JEFE DE OFICINA', 'sueldo' => 4642.225],
            ['nombre' => 'SECRETARIA DE SUBDIRECTOR', 'sueldo' => 3814.075],
            ['nombre' => 'BIBLIOTECARIO', 'sueldo' => 3136.625],
            ['nombre' => 'MEDICO GENERAL', 'sueldo' => 4877.7],
            ['nombre' => 'TÉCNICO ESPECIALIZADO', 'sueldo' => 5126.425],
            ['nombre' => 'COORDINADOR DE PROMOCIONES', 'sueldo' => 4877.7],
            ['nombre' => 'TECNICO EN MANTENIMIENTO', 'sueldo' => 3136.625],
            ['nombre' => 'SECRETARIA DE JEFE DE DEPARTAMENTO', 'sueldo' => 3291],
            ['nombre' => 'ANALISTA TÉCNICO', 'sueldo' => 4210.65],
            ['nombre' => 'PROGRAMADOR', 'sueldo' => 4642.225],
            ['nombre' => 'CAPTURISTA', 'sueldo' => 3628.15],
            ['nombre' => 'ANALISTA ESPECIALIZADO', 'sueldo' => 4877.7],
            ['nombre' => 'INTENDENTE', 'sueldo' => 3111.6],
            ['nombre' => 'SECRETARIA DE DIRECTOR', 'sueldo' => 4420.4],
            ['nombre' => 'PSICOLOGO', 'sueldo' => 4877.7],
            ['nombre' => 'CHOFER DE DIRECTOR', 'sueldo' => 3628.15],
            ['nombre' => 'CHOFER', 'sueldo' => 3111.6],
            ['nombre' => 'SECRETARIA DE DIRECTOR GENERAL', 'sueldo' => 4642.225],
            ['nombre' => 'ALMACENISTA', 'sueldo' => 3111.6],
            ['nombre' => 'VIGILANTE', 'sueldo' => 3111.6],
            ['nombre' => 'PROFESOR DE ASIGNATURA', 'sueldo' => 2458.25],
        ];

        // Insertar los datos en la tabla `plazas`
        foreach ($plazas as $plaza) {
            DB::table('plazas')->insert([
                'nombre' => $plaza['nombre'],
                'sueldo' => $plaza['sueldo'],
            ]);
        }
            
    }
}
