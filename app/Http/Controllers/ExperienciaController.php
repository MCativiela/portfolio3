<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experiencia;

class ExperienciaController extends Controller
{
    public function index()
    {
        // Ordenamos por la fecha de inicio más reciente primero
        $experiencias = Experiencia::orderBy('desde', 'desc')->get();
        return response()->json($experiencias);
    }
}
