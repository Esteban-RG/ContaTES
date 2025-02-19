<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class ExampleNominaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insertar el nomina
        DB::table('nominas')->insert([
            'id' => 255,
            'fecha_inicio' => '2025-01-01',
            'fecha_fin' => '2025-01-15',
            'salario_bruto' => 34198.59,
            'salario_neto' => 21412.03,
            'empleado_id' => 255
        ]);


        DB::table('percepciones')->insert([
            'nombre' => 'Sueldo quincenal',
            'valor' => 23344.49,
            'nomina_id' => 255,
        ]);

        DB::table('percepciones')->insert([
            'nombre' => 'Gratificación',
            'valor' => 10854.1,
            'nomina_id' => 255,
        ]);

        DB::table('deducciones')->insert([
            'nombre' => 'ISR',
            'valor' => 7529.53,
            'nomina_id' => 255,
        ]);

        DB::table('deducciones')->insert([
            'nombre' => 'Servicio de salud',
            'valor' => 1114.79913125,
            'nomina_id' => 255,
        ]);

        DB::table('deducciones')->insert([
            'nombre' => 'Fondo del sistema solidario de reparto',
            'valor' => 1470.329665,
            'nomina_id' => 255,
        ]);
        
        DB::table('deducciones')->insert([
            'nombre' => 'Sistema de capitalizacion individual',
            'valor' => 337.45271,
            'nomina_id' => 255,
        ]);

        DB::table('deducciones')->insert([
            'nombre' => 'Sistema de separacion individualizado',
            'valor' => 2334.449,
            'nomina_id' => 255,
        ]);
    }
}
