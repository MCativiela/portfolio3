<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experiencia extends Model
{
    // Como el modelo es "Experiencia", Laravel buscará "experiencias".
    // Si tu tabla se llama distinto, recordá usar:
    protected $table   = 'experiencia';
    protected $guarded = [];

    // Opcional: Un pequeño cast para manejar las fechas como objetos Carbon
    protected $casts = [
        'desde' => 'date',
        'hasta' => 'date',
    ];
}
