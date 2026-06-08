<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('educacion', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');                   // Ej: Analista de Sistemas
            $table->string('institucion');              // Ej: UNR - Universidad Nacional de Rosario
            $table->string('periodo');                  // Ej: 2018 - 2022
            $table->text('descripcion')->nullable();    // Detalles adicionales
            $table->integer('orden')->default(0);       // Para ordenar manualmente
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('educacion');
    }
};
