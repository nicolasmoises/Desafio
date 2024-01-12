<?php

namespace Database\Seeders;

use App\Models\Alumno;
use App\Models\Materia;
use App\Models\Materia_por_Alumno;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MateriaPorAlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alumnos = Alumno::all();
        $materias = Materia::all();

        foreach ($alumnos as $alumno) {
            foreach ($materias as $materia) {
                Materia_por_Alumno::create([
                    'alumno_id' => $alumno->id,
                    'materia_id' => $materia->id,
                    'estado' => 'desaprobado', 
                    'fecha' => now(), 
                ]);
            }
        }

    }
}
