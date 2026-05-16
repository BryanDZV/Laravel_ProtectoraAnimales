<?php

namespace Database\Factories;

use App\Models\Animal;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Revision>
 */
class RevisionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //integridad referencial
            //'fk_id' => Modelo::inRandomOrder()->first()->id siempre que hay fk
            'animal_id' => Animal::inRandomOrder()->first()->id, // Busca un animal que ya esté en la DB
            'user_id' => User::inRandomOrder()->first()->id,
            'fecha' => fake()->date('y,m,d', 'now'),
            'observaciones' => fake()->paragraph()
        ];
    }
}
