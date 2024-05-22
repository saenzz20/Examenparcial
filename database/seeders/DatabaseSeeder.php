<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Producto;
use App\Models\Unidad;
use App\Models\Usuario;
use App\Models\Vehiculo;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        /*User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/
        $this->call([
            CategoriaSeeder::class,
            UserSeeder::class,
            ProductoSeeder::class,
            UnidadSeeder::class,
            UsuarioSeeder::class,
            VehiculoSeeder::class
        ]);
    }
}
