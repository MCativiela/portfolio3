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
        Schema::create('conocimientos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');               // Ej: "Laravel", "Tailwind CSS", "Git"
            $table->string('categoria');            // Ej: "backend", "frontend", "herramientas"
            $table->integer('porcentaje');          // Ej: 90 (representa el 90%)
            $table->integer('orden')->default(0);   // Para ordenar cuál se muestra primero
            $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conocimientos');
    }
};
