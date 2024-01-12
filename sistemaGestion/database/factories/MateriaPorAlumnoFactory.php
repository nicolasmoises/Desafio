<?php

namespace Database\Factories;

use App\Models\Alumno;
use App\Models\Materia;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Materia_por_Alumno>
 */
class MateriaPorAlumnoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'materia_id'=>Materia::query()->inRandomOrder()->first(),
            'alumno_id'=>Alumno::query()->inRandomOrder()->first(),
            'estado'=>fake()->randomElement(['aprobado', 'desaprobado','regular','libre']),
            'fecha'=> fake()->dateTimeBetween('-1 year', 'now')
        ];
    }
}
