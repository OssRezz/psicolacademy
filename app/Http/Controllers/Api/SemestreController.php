<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CreateSemestreRequest;
use App\Models\ClaseMatricula;
use App\Models\Matricula;

class SemestreController extends Controller
{
    public function store(CreateSemestreRequest $request)
    {
        if (is_array($request->asignaturas) !== true) {
            return response()->json([
                "status" => 303,
                "message" => "Errores de validacion",
                "data" => $request->errors()
            ]);
        }
        return $request->asignaturas;
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
