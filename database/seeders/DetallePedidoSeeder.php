<?php

namespace Database\Seeders;

use App\Models\Detalle_pedido;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetallePedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Detalle_pedido::factory(20)->create();
    }
}
