<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CreateProfesoresRequest;
use App\Http\Requests\Api\UpdateProfesoresRequest;
use App\Models\Profesor;
use Exception;

class ProfesoresController extends Controller
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
            "message" => "Todos los profesores",
            "data" => Profesor::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProfesoresRequest $request)
    {
        $profesor = Profesor::create($request->all());
        return response()->json([
            "status" => 200,
            "message" => "El profesor ha sido creado con exito",
            "data" =>  $profesor
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json([
            "status" => 200,
            "message" => "Ver profesor",
            "data" => Profesor::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response()->json([
            "status" => 200,
            "message" => "Editar profesor",
            "data" =>  Profesor::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfesoresRequest $request, $id)
    {
        $profesor = Profesor::find($id);
        $profesor->update($request->all());
        return response()->json([
            "status" => 200,
            "message" => "Editar profesor",
            "data" =>  $profesor
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profesor = Profesor::find($id);
        try {
            $profesor->delete();
            return response()->json([
                "status" => 200,
                "message" => "El profesor ha sido eliminado con exito",
                "data" => $profesor
            ]);
        } catch (Exception) {
            return response()->json([
                "status" => 204,
                "message" => "El profesor no se puede eliminar por que tiene registros asociados",
                "data" => $profesor
            ]);
        }
    }
}
