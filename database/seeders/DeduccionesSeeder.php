<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DeduccionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tarifa_isr')->insert([
            ['limite_inferior' => 0.01,    'limite_superior' => 8952.49,   'cuota_fija' => 0,    'porcentaje_aplicable' => 1.92],
            ['limite_inferior' => 8952.50,    'limite_superior' => 75984.55,   'cuota_fija' => 171.88,    'porcentaje_aplicable' => 6.40],
            ['limite_inferior' => 75984.56,   'limite_superior' => 133536.07,  'cuota_fija' => 4461.94,   'porcentaje_aplicable' => 10.88],
            ['limite_inferior' => 133536.08,  'limite_superior' => 155229.80,  'cuota_fija' => 10723.55,  'porcentaje_aplicable' => 16.00],
            ['limite_inferior' => 155229.81,  'limite_superior' => 185852.57,  'cuota_fija' => 14194.54,  'porcentaje_aplicable' => 17.92],
            ['limite_inferior' => 185852.58,  'limite_superior' => 374837.88,  'cuota_fija' => 19682.13,  'porcentaje_aplicable' => 21.36],
            ['limite_inferior' => 374837.89,  'limite_superior' => 590795.99,  'cuota_fija' => 60048.40,  'porcentaje_aplicable' => 23.52],
            ['limite_inferior' => 590796.00,  'limite_superior' => 1127926.84, 'cuota_fija' => 110842.74, 'porcentaje_aplicable' => 30.00],
            ['limite_inferior' => 1127926.85, 'limite_superior' => 1503902.46, 'cuota_fija' => 271981.99, 'porcentaje_aplicable' => 32.00],
            ['limite_inferior' => 1503902.47, 'limite_superior' => 4511707.37, 'cuota_fija' => 392294.17, 'porcentaje_aplicable' => 34.00],
            ['limite_inferior' => 4511707.38, 'limite_superior' => null,        'cuota_fija' => 1414947.85,'porcentaje_aplicable' => 35.00]
        ]);


        DB::table('otras_deducciones')->insert([
            'descripcion' => 'ISSEMyM (Servicio de Salud)',
            'tipo' => 'porcentual',
            'valor' => 4.7775,
        ]);

        DB::table('otras_deducciones')->insert([
            'descripcion' => 'ISSEMyM (Fondo Solidario)',
            'tipo' => 'porcentual',
            'valor' => 6.3,
        ]);

        DB::table('otras_deducciones')->insert([
            'descripcion' => 'Cuota sindical',
            'tipo' => 'porcentual',
            'valor' => 1,
        ]);
    }
}
