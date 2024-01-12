<?php

namespace Database\Factories;

use App\Models\Carrera;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alumno>
 */
class AlumnoFactory extends Factory
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
            'apellido'=>fake()->name(),
            'dni'=>fake()->numberBetween(8),
            'telefono'=>fake()->numberBetween(10),
            'numeroDeLegajo'=>fake()->numberBetween(1,100),
            'estado'=>fake()->randomElement(['activo', 'inactivo']),
            'carrera_id'=>Carrera::query()->inRandomOrder()->first()



        ];
    }
}
