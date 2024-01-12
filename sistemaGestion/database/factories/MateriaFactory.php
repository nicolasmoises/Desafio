<?php

namespace Database\Factories;

use App\Models\Carrera;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Materia>
 */
class MateriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre'=>fake()->name(),
            'duracion'=>fake()->randomElement(['cuatrimestral', 'anual']),
            'horasCursado'=>fake()->numberBetween(1,100),
            'carrera_id'=>Carrera::query()->inRandomOrder()->first()

        ];
    }
}
