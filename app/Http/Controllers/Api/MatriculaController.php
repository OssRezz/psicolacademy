<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CreateMatriculaRequest;
use App\Http\Requests\Api\UpdateMatriculaRequest;
use App\Models\Matricula;
use Illuminate\Http\Request;

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

        if (!Matricula::find($request->estudiante_id)) {
            return response()->json([
                "status" => 204,
                "message" => "El estudiante no esta registrado en el sistema",
                "data" =>   $request->all()
            ]);
        }
        return response()->json([
            "status" => 200,
            "message" => "Matricula creada exitosamente",
            "data" => Matricula::create($request->all())
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
        return response()->json([
            "status" => 200,
            "message" => "Matricula actualiza",
            "data" => $matricula
        ]);
    }
}
