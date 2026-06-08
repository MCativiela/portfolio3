<?php

namespace App\Http\Controllers;

use App\Models\DatosPersonales;        // Importante importar el modelo

use Illuminate\Http\Request;

class DatosPersonalesController extends Controller
{
    public function show()
    {
        // Traemos el primer registro de la tabla
        $datos = DatosPersonales::first();

        // Enviamos los datos a la vista 'cv'
        return $datos;
    }
}
