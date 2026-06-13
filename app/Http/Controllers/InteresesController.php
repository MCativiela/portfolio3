<?php

namespace App\Http\Controllers;

use App\Models\Intereses;
use Illuminate\Http\Request;

class InteresesController extends Controller
{
    public function index()
    {
        return response()->json(Intereses::orderBy('orden', 'asc')->get());
    }
}
