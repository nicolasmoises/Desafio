<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\Materia_por_Alumno;
use Illuminate\Http\Request;

class MateriaPorAlumnoController extends Controller
{
    public function index(){
        $reg = Materia_por_Alumno::all();
        return $reg;
    }

    public function show(Materia_por_Alumno $reg){
        return $reg;
    }

    public function store(Request $request){
        $validate = $request->validate([
            'materia_id' => ['required', 'exists:materia,id'],
            'alumno_id' => ['required', 'exists:alumno,id'],
            'estado' => ['required', 'in:aprobado,desaprobado,regular,libre'],
            'fecha' => ['required', 'date'],
        ]);

        $obj = Materia_por_Alumno::create([
            'materia_id' => $request->materia_id,
            'alumno_id' => $request->alumno_id,
            'dni' => $request->dni,
            'estado' => $request->estado,
            'fecha' => $request->fecha,

        ]);


        return $obj;
    }

    public function update(Materia_por_Alumno $reg,Request $request ){
        $validate = $request->validate([
            'materia_id' => ['sometimes', 'exists:materia,id'],
            'alumno_id' => ['sometimes', 'exists:alumno,id'],
            'estado' => ['sometimes', 'in:aprobado,desaprobado,regular,libre'],
            'fecha' => ['sometimes', 'date'],
        ]);

        $reg->update($request->all());
        return $reg;

    

    }

    public function destroy(Materia_por_Alumno $reg){
        $reg->delete();
        return 'Registro eliminado exitosamente';

    }
}
