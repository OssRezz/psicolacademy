<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CreateClaseRequest;
use App\Http\Requests\Api\UpdateClaseRequest;
use App\Models\Asignatura;
use App\Models\Clase;
use App\Models\Profesor;
use Illuminate\Http\Request;

class ClasesController extends Controller
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
            "message" => "Todas las clases",
            "data" => Clase::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateClaseRequest $request)
    {
        if (!Asignatura::find($request->asignatura_id)) {
            return response()->json([
                "status" => 204,
                "message" => "La asignatura no se encuentra registrada",
                "data" =>   $request->all()
            ]);
        }
        if (!Profesor::find($request->profesor_id)) {
            return response()->json([
                "status" => 204,
                "message" => "El profesor no se encuentra registrado",
                "data" =>   $request->all()
            ]);
        }
        return response()->json([
            "status" => 200,
            "message" => "Clase creada exitosamente",
            "data" => Clase::create($request->all())
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Clase $clase)
    {
        return response()->json([
            "status" => 200,
            "message" => "Ver clase",
            "data" => $clase
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Clase $clase)
    {
        return response()->json([
            "status" => 200,
            "message" => "Editar clase",
            "data" => $clase
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClaseRequest $request, Clase $clase)
    {
        if (!Asignatura::find($request->asignatura_id)) {
            return response()->json([
                "status" => 204,
                "message" => "La asignatura no se encuentra registrada",
                "data" =>   $request->all()
            ]);
        }
        if (!Profesor::find($request->profesor_id)) {
            return response()->json([
                "status" => 204,
                "message" => "El profesor no se encuentra registrado",
                "data" =>   $request->all()
            ]);
        }

        $clase->update($request->all());
        return response()->json([
            "status" => 200,
            "message" => "Clase actualizada exitosamente",
            "data" => $clase
        ]);
    }
}
