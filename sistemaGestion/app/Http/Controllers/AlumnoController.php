<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function index(){
        $alumnos = Alumno::all();
        return $alumnos;
    }

    public function show(Alumno $alumnos){
        return $alumnos;
    }

    public function store(Request $request){
        $validate = $request->validate([
            'nombre' => ['string', 'required', 'max:50'],
            'apellido' => ['string', 'required', 'max:50'],
            'dni' => ['string', 'required', 'max:50'],
            'telefono' => ['string','required', 'max:50'],
            'numeroDeLegajo' => ['string', 'required', 'max:50'],
            'estado' => ['required', 'in:activo,inactivo'],
            'carrera_id' => ['required', 'exists:carrera,id'],
        ]);

        $obj = Alumno::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'dni' => $request->dni,
            'telefono' => $request->telefono,
            'numeroDeLegajo' => $request->numeroDeLegajo,
            'estado' => $request->estado,
            'carrera_id' => $request->carrera_id,

        ]);

        return $obj;
    }

    public function update(Alumno $alumno,Request $request ){
        $validate = $request->validate([
            'nombre' => ['string', 'sometimes', 'max:50'],
            'apellido' => ['string', 'sometimes', 'max:50'],
            'dni' => ['string', 'sometimes'],
            'telefono' => ['string','sometimes', 'max:50'],
            'numeroDeLegajo' => ['string', 'sometimes', 'max:50'],
            'estado' => ['sometimes', 'in:activo,inactivo'],
            'carrera_id' => ['sometimes', 'exists:carrera,id'],
        ]);

        $alumno->update($request->all());
        return $alumno;

    }

    public function destroy(Alumno $alumno){
        $alumno->delete();
        return 'Alumno eliminado exitosamente';

    }


}
