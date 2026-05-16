<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Adopcion>
 */
class AdopcionFactory extends Factory
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
            'adoptante_nombre' => fake()->firstName(),
            'fecha_adopcion' => fake()->date('y-m-d', 'now'),
            'seguimiento' => fake()->randomElement([true, false])
        ];
    }
}
