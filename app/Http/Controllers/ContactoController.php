<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactoRecibido;

class ContactoController extends Controller
{
    public function enviar(Request $request)
    {
        $request->validate([
            'correo'  => 'required|email',
            'asunto'  => 'required|string|max:100',
            'mensaje' => 'required|string',
        ]);

        $datos = $request->only('correo', 'asunto', 'mensaje');

        // Tu dirección real a donde querés que te lleguen las ofertas
        Mail::to('tu-correo-real@gmail.com')->send(new ContactoRecibido($datos));

        return response()->json(['success' => true, 'message' => '¡Mensaje enviado con éxito!']);
    }
}
