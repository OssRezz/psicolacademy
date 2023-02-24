<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CreateMatriculaRequest;
use App\Http\Requests\Api\UpdateMatriculaRequest;
use App\Http\Requests\Api\CreateEstudianteMatriculaRequest;
use App\Models\ClaseMatricula;
use App\Models\Estudiante;
use App\Models\Matricula;

class MatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            "status" => 200,
            "message" => "Todas las matriculas",
            "data" => Matricula::with('estudiante')->orderByDesc('id')->get()
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMatriculaRequest $request)
    {
        if (!Estudiante::find($request->estudiante_id)) {
            return response()->json([
                "status" => 204,
                "message" => "El estudiante no esta registrado en el sistema",
                "data" =>   $request->all()
            ]);
        }

        $matricula = Matricula::where([['estudiante_id', $request->estudiante_id], ['estado', '=', 1]])->get();
        if (count($matricula) != 0) {
            return response()->json([
                "status" => 204,
                "message" => "El estudiante ya se encuentra en proceso academico",
                "data" =>  []
            ]);
        }

        $matricula = Matricula::create($request->all());
        $matricula = Matricula::with('estudiante')->find($matricula->id);

        //Ingresamos cada una de las asignaciones seleccionadas y las vamos a  referencias con el id de la matricula
        foreach ($request->asignaturas as  $value) {
            $request->merge(['matricula_id' =>  $matricula->id]);
            $request->merge(['clase_id' => $value['id']]);
            ClaseMatricula::create($request->all());
        }

        $matricula->creditos = $request->creditos;
        $matricula->asignaturas = 1;
        $matricula->update();

        return response()->json([
            "status" => 200,
            "message" => "Matricula y asignaturas creadas exitosamente",
            "data" => $matricula
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Matricula $matricula)
    {
        return response()->json([
            "status" => 200,
            "message" => "Ver una matricula",
            "data" => $matricula
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Matricula $matricula)
    {
        return response()->json([
            "status" => 200,
            "message" => "Editar una matricula",
            "data" => $matricula
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMatriculaRequest $request, Matricula $matricula)
    {
        $matricula->update($request->all());
        $matricula = Matricula::with('estudiante')->find($matricula->id);
        return response()->json([
            "status" => 200,
            "message" => "Matricula actualiza",
            "data" => $matricula
        ]);
    }
}
