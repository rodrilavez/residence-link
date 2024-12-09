<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Zona;
use App\Models\Propiedad;
use App\Models\Residente;
use App\Models\Guardia;
use App\Models\Horario;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Crear un usuario admin
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);

        // Crear un usuario guardia
        $guardUser = User::create([
            'name' => 'Guardia 1',
            'email' => 'guardia1@example.com',
            'password' => Hash::make('password'),
            'role' => 'guard'
        ]);

        // Crear un usuario residente
        $residenteUser = User::create([
            'name' => 'Residente 1',
            'email' => 'residente1@example.com',
            'password' => Hash::make('password'),
            'role' => 'residente'
        ]);

        // Crear zonas
        $zona1 = Zona::create([
            'nombre' => 'Zona A',
            'descripcion' => 'Cluster principal'
        ]);
        
        $zona2 = Zona::create([
            'nombre' => 'Zona B',
            'descripcion' => 'Cluster secundario'
        ]);

        // Crear propiedades
        $prop1 = Propiedad::create([
            'zona_id' => $zona1->id,
            'nombre' => 'Casa 101',
            'descripcion' => 'Casa en zona A',
            'es_amenidad' => false,
            'direccion'=> 'Calle Falsa 123'
        ]);

        $propAmenidad = Propiedad::create([
            'zona_id' => $zona1->id,
            'nombre' => 'Piscina Comunitaria',
            'descripcion' => 'Piscina de la zona A',
            'es_amenidad' => true,
            'direccion'=> 'sin direccion'
        ]);

        // Asignar residente a una propiedad existente
        Residente::create([
            'user_id' => $residenteUser->id,
            'propiedad_id' => $prop1->id,
            'nombre' => 'Juan Pérez',
            'telefono' => '555-1234'
        ]);

        // Crear guardia asociado a una zona
        $guardia1 = Guardia::create([
            'user_id' => $guardUser->id,
            'zona_id' => $zona1->id
        ]);

        // Crear horario para el guardia
        Horario::create([
            'guardia_id' => $guardia1->id,
            'inicio' => now(),
            'fin' => now()->addHours(8),
        ]);

        $this->call([
            PropertiesTableSeeder::class,
            AmenitiesTableSeeder::class,
            ResidentsTableSeeder::class,
        ]);
    }
}
