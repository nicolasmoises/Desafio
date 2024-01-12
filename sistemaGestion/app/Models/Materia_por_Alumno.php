<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia_por_Alumno extends Model
{
    use HasFactory;

    protected $table ='materia_por_alumnos';
    protected $fillable = [
        'materia_id',
        'alumno_id',
        'estado',
        'fecha'
    ];

    public function alumno (){
        return $this->belongsTo(Alumno::class);
    }

    public function materia (){
        return $this->belongsTo(Materia::class);
    }

}
