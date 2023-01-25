<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Clase;
use App\Models\ClaseMatricula;
use App\Models\Estudiante;
use App\Models\Matricula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Retorna la vista index de la pagina dashboard url = /
     */
    public function index()
    {
        $matriculas = Matricula::count();
        $clases = Clase::where('estado', 1)->count();
        $estudiantes = Estudiante::count();
        return view('dashboard.index', compact('matriculas', 'clases', 'estudiantes'));
    }


    /**
     * Consulta para conocer el total de matriculas por asignatura
     */
    public function chartAsignatura()
    {
        $asignaturas = ClaseMatricula::join('clases', 'clases.id', '=', 'clases_matricula.clase_id')
            ->join('asignaturas', 'asignaturas.id', '=', 'clases.asignatura_id')
            ->groupBy('asignaturas.nombre')
            ->select('asignaturas.nombre', DB::raw('count(asignatura_id) as total'))
            ->take(5)->orderByDesc('total')->get();
        return $asignaturas;
    }

    /**
     * Consulta para conocer el total de matriculas por profesor
     */
    public function chartProfesor()
    {
        $profesores = ClaseMatricula::join('clases', 'clases.id', '=', 'clases_matricula.clase_id')
            ->join('profesores', 'profesores.id', '=', 'clases.profesor_id')
            ->groupBy('clases.profesor_id', 'profesores.nombres', 'profesores.apellidos')
            ->select(DB::raw('count(profesor_id) as total'), DB::raw("concat_ws(' ',profesores.nombres,profesores.apellidos) AS nombre_profesors"))
            ->take(5)->orderByDesc('total')->get();


        return $profesores;
    }
}
