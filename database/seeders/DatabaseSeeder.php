<?php

namespace Database\Seeders;

use App\Models\Detalle_pedido;
use App\Models\Plato;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\PedidoSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            UserSeeder::class,
            ClienteSeeder::class,
            PlatoSeeder::class,
            PedidoSeeder::class,
            DetallePedidoSeeder::class,
        ]);

        
    }
}
