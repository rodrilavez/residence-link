<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Propiedad;
use App\Models\Zona;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create an admin user
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);

        // Create multiple zones
        $zona1 = Zona::create(['nombre' => 'Zona Norte', 'descripcion' => 'Zona residencial al norte de la ciudad']);
        $zona2 = Zona::create(['nombre' => 'Zona Sur', 'descripcion' => 'Zona comercial al sur de la ciudad']);
        $zona3 = Zona::create(['nombre' => 'Zona Este', 'descripcion' => 'Zona industrial al este de la ciudad']);
        $zona4 = Zona::create(['nombre' => 'Zona Oeste', 'descripcion' => 'Zona mixta al oeste de la ciudad']);

        // Create multiple properties
        Propiedad::create(['nombre' => 'Casa en Zona Norte', 'direccion' => 'Calle Falsa 123', 'zona_id' => $zona1->id, 'user_id' => $admin->id]);
        Propiedad::create(['nombre' => 'Departamento en Zona Sur', 'direccion' => 'Avenida Siempre Viva 742', 'zona_id' => $zona2->id, 'user_id' => $admin->id]);
        Propiedad::create(['nombre' => 'Oficina en Zona Este', 'direccion' => 'Calle Industrial 456', 'zona_id' => $zona3->id, 'user_id' => $admin->id]);
        Propiedad::create(['nombre' => 'Tienda en Zona Oeste', 'direccion' => 'Avenida Comercial 789', 'zona_id' => $zona4->id, 'user_id' => $admin->id]);
    }
}
