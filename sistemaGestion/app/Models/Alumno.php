<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;
    protected $table ='alumno';

    protected $fillable = [
        'nombre',
        'apellido',
        'dni',
        'telefono',
        'numeroDeLegajo',
        'estado',
        'carrera_id'
    ];

    public function carrera(){
        return $this->belongsTo(Carrera::class);
    }

    public function MateriaPorAlumno(){
        return $this->hasMany(Materia_por_Alumno::class);
    }
    


}
