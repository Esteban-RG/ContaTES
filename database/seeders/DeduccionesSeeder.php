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
            ['limite_inferior' => 0.01, 'limite_superior' => 368.10, 'cuota_fija' => 0, 'porcentaje_aplicable' => 1.92],
            ['limite_inferior' => 368.11, 'limite_superior' => 3124.35, 'cuota_fija' => 7.05, 'porcentaje_aplicable' => 6.40],
            ['limite_inferior' => 3124.36, 'limite_superior' => 5490.75, 'cuota_fija' => 183.45, 'porcentaje_aplicable' => 10.88],
            ['limite_inferior' => 5490.76, 'limite_superior' => 6382.80, 'cuota_fija' => 441, 'porcentaje_aplicable' => 16.00],
            ['limite_inferior' => 6382.81, 'limite_superior' => 7641.90, 'cuota_fija' => 583.65, 'porcentaje_aplicable' => 17.92],
            ['limite_inferior' => 7641.91, 'limite_superior' => 15412.80, 'cuota_fija' => 809.25, 'porcentaje_aplicable' => 21.36],
            ['limite_inferior' => 15412.81, 'limite_superior' => 24292.65, 'cuota_fija' => 2469.15, 'porcentaje_aplicable' => 23.52],
            ['limite_inferior' => 24292.66, 'limite_superior' => 46378.50, 'cuota_fija' => 4557.75, 'porcentaje_aplicable' => 30.00],
            ['limite_inferior' => 46378.51, 'limite_superior' => 61838.10, 'cuota_fija' => 11183.40, 'porcentaje_aplicable' => 32.00],
            ['limite_inferior' => 61838.11, 'limite_superior' => 185514.30, 'cuota_fija' => 16130.55, 'porcentaje_aplicable' => 34.00],
            ['limite_inferior' => 185514.31, 'limite_superior' => null, 'cuota_fija' => 58180.35, 'porcentaje_aplicable' => 35.00]
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
