<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CreateEstudianteRequest;
use App\Http\Requests\Api\UpdateEstudianteRequest;
use App\Models\Estudiante;
use App\Models\User;
use Exception;

class EstudiantesController extends Controller
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
            "message" => "Todos los estudiantes",
            "data" => Estudiante::orderByDesc('id')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEstudianteRequest $request)
    {
        $request->merge(["rol_id" => "3"]);
        $request->merge(["name" => $request->nombres . ' ' . $request->apellidos]);
        $request->merge(["password" => $request->documento]);

        $user = User::create($request->all());
        $estudiante = Estudiante::create($request->all());
        return response()->json([
            "status" => 200,
            "message" => "El Estudiante ha sido creado con exito",
            "data" => $estudiante
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Estudiante $estudiante)
    {
        return response()->json([
            "status" => 200,
            "message" => "Ver estudiante",
            "data" => $estudiante
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Estudiante $estudiante)
    {
        return response()->json([
            "status" => 200,
            "message" => "Editar estudiante",
            "data" => $estudiante
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEstudianteRequest $request, Estudiante $estudiante)
    {
        $estudiante->update($request->all());
        return response()->json([
            "status" => 200,
            "message" => "El Estudiante ha sido actualizado con exito",
            "data" => $estudiante
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estudiante $estudiante)
    {
        try {
            $estudiante->delete();
            return response()->json([
                "status" => 200,
                "message" => "El Estudiante ha sido eliminado con exito",
                "data" => $estudiante
            ]);
        } catch (Exception) {
            return response()->json([
                "status" => 204,
                "message" => "El Estudiante no se puede eliminar por que tiene registros asociados",
                "data" => $estudiante
            ]);
        }
    }
}
