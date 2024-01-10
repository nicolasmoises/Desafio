<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;
    protected $table = 'carrera';

    protected $fillable = [
        'nombre',
        'duracion'
    ];

    public function alumno(){
        return $this->hasMany(Alumno::class);
    }
    public function materia(){
        return $this->hasMany(Materia::class);
    }


}
