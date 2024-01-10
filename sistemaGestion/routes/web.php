<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\MateriaPorAlumnoController;
use App\Http\Controllers\UserController;
use App\Models\Materia_por_Alumno;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('alumnos', [AlumnoController::class, 'index']);
Route::get('alumnos/{alumno}', [AlumnoController::class, 'show']);
Route::post('alumno', [AlumnoController::class, 'store']);
Route::put('alumnos/{alumno}', [AlumnoController::class, 'update']);
Route::delete('alumnos/{alumno}', [AlumnoController::class, 'destroy']);

Route::get('carreras', [CarreraController::class, 'index']);
Route::get('carrera/{carrera}', [CarreraController::class, 'show']);
Route::post('carrera', [CarreraController::class, 'store']);
Route::put('carreras/{carrera}', [CarreraController::class, 'update']);
Route::delete('carrera/{carrera}', [CarreraController::class, 'destroy']);

Route::get('materias', [MateriaController::class, 'index']);
Route::get('materias/{materia}', [MateriaController::class, 'show']);
Route::post('materia', [MateriaController::class, 'store']);
Route::put('materias/{materia}', [MateriaController::class, 'update']);
Route::delete('materias/{materia}', [MateriaController::class, 'destroy']);

Route::get('registros', [MateriaPorAlumnoController::class, 'index']);
Route::get('registros/{registro}', [MateriaPorAlumnoController::class, 'show']);
Route::post('registro', [MateriaPorAlumnoController::class, 'store']);
Route::put('registros/{registro}', [MateriaPorAlumnoController::class, 'update']);
Route::delete('registros/{registro}', [MateriaPorAlumnoController::class, 'destroy']);

Route::get('usuarios', [UserController::class, 'index']);
Route::get('usuarios/{usuario}', [UserController::class, 'show']);
Route::post('usuarios', [UserController::class, 'store']);
Route::put('usuarios/{usuario}', [UserController::class, 'update']);
Route::delete('usuarios/{usuario}', [UserController::class, 'destroy']);







