<?php

namespace Database\Factories;

use App\Models\Pedido;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pedido>
 */
class PedidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cliente_id' => $this->faker->numberBetween(1, 10),
            'fecha' => $this->faker->date(),
            'forma_de_pago' => $this->faker->randomElement(['Efectivo', 'Tarjeta', 'Transferencia']),
            'total' => $this->faker->numberBetween(1000, 30000),
            'estado' => $this->faker->randomElement(['pendiente', 'procesado', 'entregado', 'cancelado']),
        ];
    }
}
