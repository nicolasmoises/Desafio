<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    public function index(){
        $materia = Materia::all();
        return $materia;
    }

    public function show(Materia $materia){
        return $materia;
    }

    public function store(Request $request){
        $validate = $request->validate([
            'nombre' => ['string', 'required', 'max:50'],
            'duracion' => ['string', 'in:cuatrimestral,anual'],
            'horasCursado' => ['string', 'required', 'max:50'],
            'carrera_id' => ['required', 'exists:carrera,id'],
        ]);

        $obj = Materia::create([
            'nombre' => $request->nombre,
            'duracion' => $request->duracion,
            'horasCursado' => $request->horasCursado,
            'carrera_id' => $request->carrera_id,

        ]);

        return $obj;
    }

    public function update(Materia $materia,Request $request ){
        $validate = $request->validate([
            'nombre' => ['string', 'sometimes', 'max:50'],
            'duracion' => ['string', 'in:cuatrimestral,anual'],
            'horasCursado' => ['sometimes', 'max:50'],
            'carrera_id' => ['sometimes', 'exists:carrera,id'],
        ]);

        $materia->update($request->all());
        return $materia;

    }

    public function destroy(Materia $materia){
        $materia->delete();
        return 'Materia eliminada exitosamente';

    }

}
