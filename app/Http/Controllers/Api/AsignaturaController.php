<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CreateAsignaturasRequest;
use App\Http\Requests\Api\UpdateAsignaturasRequest;
use App\Models\Area;
use App\Models\Asignatura;
use Exception;
use Illuminate\Http\Request;

class AsignaturaController extends Controller
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
            "message" => "Todas las  asignaturas",
            "data" => Asignatura::with('area')->orderByDesc('id')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAsignaturasRequest $request)
    {
        if (!Area::find($request->area_id)) {
            return response()->json([
                "status" => 204,
                "message" => "El id del area no se encuentra registrado",
                "data" =>   $request->all()
            ]);
        }
        return response()->json([
            "status" => 200,
            "message" => "La asignatura ha sido creado con exito",
            "data" =>   Asignatura::create($request->all())
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Asignatura $asignatura)
    {
        return response()->json([
            "status" => 200,
            "message" => "Ver una asignatura",
            "data" => $asignatura
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Asignatura $asignatura)
    {
        return response()->json([
            "status" => 200,
            "message" => "Editar una asignatura",
            "data" => $asignatura
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAsignaturasRequest $request, Asignatura $asignatura)
    {
        if (!Area::find($request->area_id)) {
            return response()->json([
                "status" => 204,
                "message" => "El id del area no se encuentra registrado",
                "data" =>   $request->all()
            ]);
        }
        $asignatura->update($request->all());
        return response()->json([
            "status" => 200,
            "message" => "La asignatura ha sido actualizada con exito",
            "data" =>   $asignatura
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asignatura $asignatura)
    {
        try {
            $asignatura->delete();
            return response()->json([
                "status" => 200,
                "message" => "La asignatura ha sido eliminada con exito",
                "data" => $asignatura
            ]);
        } catch (Exception) {
            return response()->json([
                "status" => 204,
                "message" => "La asignatura no se puede eliminar por que tiene registros asociados",
                "data" => $asignatura
            ]);
        }
    }
}
