<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ExampleEmployeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Verificar si el usuario ya existe
        $existingUser = DB::table('users')->find(255);

        if ($existingUser) {
            echo "El usuario con ID 255 ya existe.\n";
        } else {
            // Insertar el usuario
            DB::table('users')->insert([
                'id' => 255,
                'name' => 'EstebanRG',
                'email' => 'ricardoespace@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Insertar datos personales
        DB::table('personas')->updateOrInsert(
            ['id' => 255], // Condición para buscar el registro
            [
                'user_id' => 255,
                'nombre' => 'Ricardo Esteban',
                'ap_paterno' => 'Reyes',
                'ap_materno' => 'Gutierrez',
                'telefono' => '5959528172',
                'genero' => 'M',
            ]
        );

        // Insertar datos laborales
        DB::table('empleados')->updateOrInsert(
            ['id' => 255], // Condición para buscar el registro
            [
                'persona_id' => 255,
                'matricula' => 2021451014,
                'fecha_ingreso' => now(),
                'plaza_id' => 1,
                'curp' => 'test',
                'rfc' => 'test',
                'nss' => 'test',
            ]
        );
    }
}