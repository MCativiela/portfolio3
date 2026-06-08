<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Migración tabla "Enlaces". Es la botonera dinámica
     */
    public function up(): void
    {
        Schema::create('enlaces', function (Blueprint $table) {
            $table->id();
            $table->string('texto', 50);        // Nombre del botón (Ej: "Proyecto Vue", "App React")
            $table->string('url');              // Link de Netlify
            $table->string('tooltip');          // La descripción flotante (Ej: "Sistema de gestión hecho en Vue 3")
            $table->string('icono', 50)->nullable(); // Opcional, por si querés o no ponerle icono (Ej: "fa-vial")
            $table->integer('orden')->default(0);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enlaces');
    }
};
