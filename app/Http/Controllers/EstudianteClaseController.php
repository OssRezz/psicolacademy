<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Clase;
use App\Models\ClaseMatricula;
use App\Models\Matricula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EstudianteClaseController extends Controller
{
    /**
     * Retorna la vista index de la pagina semestres url = semestres (Donde un estudiante selecciona las asignacioness)
     */
    public function index()
    {
        $estudiante = Matricula::join('estudiantes', 'estudiantes.id', '=', 'matriculas.estudiante_id')
            ->select('matriculas.*', 'estudiantes.nombres', 'estudiantes.apellidos', 'estudiantes.documento')
            ->where([['estudiantes.email', '=', Auth::user()->email], ['matriculas.estado', '<>', '0']])
            ->take(1)->get();

        $ClaseMatricula = [];
        if (count($estudiante) > 0) {
            $ClaseMatricula = ClaseMatricula::join('matriculas', 'matriculas.id', '=', 'clases_matricula.matricula_id')
                ->join('clases', 'clases.id', '=', 'clases_matricula.clase_id')
                ->join('asignaturas', 'asignaturas.id', '=', 'clases.asignatura_id')
                ->join('profesores', 'profesores.id', '=', 'clases.profesor_id')
                ->join('estudiantes', 'estudiantes.id', '=', 'matriculas.estudiante_id')
                ->select(
                    'clases_matricula.*',
                    'matriculas.estado',
                    'matriculas.semestre',
                    'clases.hora_inicio',
                    'clases.hora_fin',
                    'profesores.nombres as nombre_profesor',
                    'profesores.apellidos as apellido_profesor',
                    'asignaturas.nombre as nombre_asignatura',
                    'asignaturas.creditos as credito_matricula',
                )
                ->where([['estudiantes.email', '=', Auth::user()->email], ['matriculas.estado', '<>', '0']])
                ->get();
        }

        return view('semestres.index', compact('estudiante', 'ClaseMatricula'));
    }

    /**
     * Retorna todas las clases creadas en la aplicacion
     * Una clase de compone de un profesor y una asignatura
     */
    public function asignaturas()
    {
        return  Clase::with('profesor', 'asignatura.area')->where('estado', 1)->get();
    }

    /**
     * Ingresar las asignaturas del estudiante al sistema
     */
    public function ingresar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'asignaturas' => 'required|array',
            'matricula_id' => 'required|string',
        ]);

        if ($validator->fails() || is_array($request->asignaturas) !== true) {
            return response()->json([
                "status" => 303,
                "message" => "Errores de validacion",
                "data" => $validator->errors()
            ]);
        }


        //Ingresamos cada una de las asignaciones seleccionadas y las vamos a  referencias con el id de la matricula
        foreach ($request->asignaturas as $key => $value) {
            $ClaseMatricula = new ClaseMatricula();
            $ClaseMatricula->matricula_id = $request->matricula_id;
            $ClaseMatricula->clase_id = $value['id'];
            $ClaseMatricula->save();
        }

        //Editamos los creditos finales que el estudiante tuvo y decimos que las asignaturas fueron completadas ($matricula->asignaturas = 1)
        $matricula = Matricula::find($request->matricula_id);
        $matricula->creditos = $request->creditos;
        $matricula->asignaturas = 1;
        $matricula->update();

        return response()->json([
            "status" => 200,
            "message" => "Se ha completado el registro de las asignaturas de manera exitosa.",
        ]);
    }
}
