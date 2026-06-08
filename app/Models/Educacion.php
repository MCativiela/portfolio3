<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Educacion extends Model
{
    // Con esto le dices a Laravel: "No busques 'educacions', buscá 'educacion'"
    protected $table   = 'educacion';
    protected $guarded = [];
}
