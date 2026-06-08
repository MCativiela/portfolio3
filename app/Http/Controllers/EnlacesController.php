<?php

namespace App\Http\Controllers;

use App\Models\Enlaces;
use Illuminate\Http\Request;

class EnlacesController extends Controller
{
    public function index()
    {
        // Traemos las rutas externas ordenadas
        $enlaces = Enlaces::orderBy('orden', 'asc')->get();
        return response()->json($enlaces);
    }
}
