<?php

namespace App\Http\Controllers;

use App\Models\Intereses;
use Illuminate\Http\Request;

class InteresesController extends Controller
{
    public function index()
    {
        $intereses = Intereses::orderBy('orden', 'asc')->get();
        return response()->json($intereses);
    }
}
