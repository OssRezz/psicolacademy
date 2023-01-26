<?php

use App\Http\Controllers\Api\AreasController;
use App\Http\Controllers\Api\AsignaturaController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ClasesController;
use App\Http\Controllers\Api\EstudiantesController;
use App\Http\Controllers\Api\MatriculaController;
use App\Http\Controllers\Api\ProfesoresController;
use App\Http\Controllers\Api\RolesController;
use App\Http\Controllers\Api\SemestreController;
use App\Http\Controllers\Api\UsuarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('login', [AuthController::class, 'login']);


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('areas', [AreasController::class, 'index']);
    Route::get('roles', [RolesController::class, 'index']);
    Route::post('semestre', [SemestreController::class, 'store']);

    Route::resource('estudiantes', EstudiantesController::class)->except('create');
    Route::resource('profesores', ProfesoresController::class)->except('create');
    Route::resource('asignaturas', AsignaturaController::class)->except('create');
    Route::resource('clases', ClasesController::class)->except('create', 'destroy');
    Route::resource('matriculas', MatriculaController::class)->except('create', 'destroy');
    Route::resource('usuarios', UsuarioController::class)->only('index', 'show', 'store');
});
