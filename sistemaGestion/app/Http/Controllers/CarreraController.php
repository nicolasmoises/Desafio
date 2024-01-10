<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    public function index(){
        $carrera = Carrera::all();
        return $carrera;
    }

    public function show(Carrera $carrera){
        return $carrera;
    }

    public function store(Request $request){
        $validate = $request->validate([
            'nombre' => ['string', 'required', 'max:50'],
            'duracion' => ['string', 'required']
        ]);

        $obj = Carrera::create([
            'nombre' => $request->nombre,
            'duracion' => $request->duracion
        ]);

        return $obj;
    }

    public function update(Carrera $carrera,Request $request){
        $validate = $request->validate([
            'nombre' => ['string', 'sometimes'],
            'duracion' => ['string', 'sometimes']
        ]);

        $carrera->update($request->all());
        return $carrera;
    }

    public function destroy(Carrera $carrera){
        $carrera->delete();
        return 'Carrera eliminada exitosamente';

    }
    



}
