<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Animal>
 */
class AnimalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'nombre' => fake()->firstName(),
            'especie' => fake()->randomElement(['perro', 'gato', 'conejo', 'hamster', 'tortuga']),
            'fecha_nacimiento' => fake()->date('y-m-d',  'now'),
            'chip' => fake()->unique()->bothify('CHIP-######'), // Genera un número de chip único con el formato "CHIP-123456"

        ];
    }
}
