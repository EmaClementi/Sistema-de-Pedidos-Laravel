<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Detalle_pedido>
 */
class Detalle_pedidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pedido_id' => $this->faker->numberBetween(1, 10),
            'plato_id' => $this->faker->numberBetween(1, 15),
            'cantidad' => $this->faker->numberBetween(1, 10),
        ];
    }
}
