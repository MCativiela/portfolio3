<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Educacion;

class EducacionController extends Controller
{
    public function index()
    {
        // Traemos todos los estudios ordenados
        $estudios = Educacion::orderBy('orden', 'asc')->get();
        return response()->json($estudios);
    }
}
