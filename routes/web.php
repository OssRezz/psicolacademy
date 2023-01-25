<?php

use App\Http\Controllers\AsignaturasController;
use App\Http\Controllers\ClasesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EstudianteClaseController;
use App\Http\Controllers\EstudiantesController;
use App\Http\Controllers\MatriculasController;
use App\Http\Controllers\ProfesoresController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [UsersController::class, 'loginIndex']);
Route::post('login/in', [UsersController::class, 'login']);
Route::post('login/out', [UsersController::class, 'logout']);


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {

    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::get('chart/asignaturas', [DashboardController::class, 'chartAsignatura']);
    Route::get('chart/profesores', [DashboardController::class, 'chartProfesor']);

    Route::resource('users', UsersController::class);
    Route::resource('profesores', ProfesoresController::class);
    Route::resource('estudiantes', EstudiantesController::class);
    Route::resource('matriculas', MatriculasController::class);
    Route::resource('asignaturas', AsignaturasController::class);
    Route::resource('clases', ClasesController::class);

    Route::get('report/{estudiante}', [EstudiantesController::class, 'report']);
    Route::get('semestres', [EstudianteClaseController::class, 'index']);
    Route::get('semestres/asignaturas', [EstudianteClaseController::class, 'asignaturas']);
    Route::post('semestres/ingresar', [EstudianteClaseController::class, 'ingresar']);
});
