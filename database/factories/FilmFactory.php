<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class FilmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre'  => fake()->name(),
            'director' => fake()->name(),
            'duracion' => fake()->name(),
            'genero' => fake()->name(),
            'año'=>fake()->date()
        ];
    }
}
