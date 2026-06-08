<?php

namespace App\Http\Controllers;

use App\Models\Conocimientos;
use Illuminate\Http\Request;

class ConocimientosController extends Controller
{
    public function index()
    {
        // Traemos todos los conocimientos ordenados
        $conocimientos = Conocimientos::orderBy('orden', 'asc')->get();
        return response()->json($conocimientos);
    }
}
