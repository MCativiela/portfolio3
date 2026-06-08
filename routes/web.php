<?php

use App\Http\Controllers\CVController;
use App\Http\Controllers\DatosPersonalesController;
use App\Http\Controllers\EducacionController;
use App\Http\Controllers\ExperienciaController;
use App\Http\Controllers\ConocimientosController;
use App\Http\Controllers\InteresesController;
use App\Http\Controllers\EnlacesController;
use App\Http\Controllers\ContactoController;

use App\Models\DatosPersonales;

use Illuminate\Support\Facades\Route;

Route::get('/', [CVController::class, 'home']);
Route::get('/datosPersonales', [DatosPersonalesController::class, 'show']);
Route::get('/datosEducacion', [EducacionController::class, 'index']);
Route::get('/datosExperiencia', [ExperienciaController::class, 'index']);
Route::get('/datosConocimientos', [ConocimientosController::class, 'index']);
Route::get('/datosIntereses', [InteresesController::class, 'index']);
Route::get('/datosEnlaces', [EnlacesController::class, 'index']);
Route::post('/enviarContacto', [ContactoController::class, 'enviar']);
