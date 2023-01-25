<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Area;
use Illuminate\Http\Request;

class AreasController extends Controller
{
    public function index()
    {
        return response()->json([
            "status" => 200,
            "message" => "Ver estudiante",
            "data" => Area::all()
        ]);
    }
}
