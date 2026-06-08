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
        Schema::create('intereses', function (Blueprint $table) {
            $table->id();
            $table->string('interes', 100); // Ej: "Fútbol", "Música", "Fotografía"
            $table->text('descripcion')->nullable(); // Una breve frase de por qué te gusta
            $table->string('icono', 50)->default('fa-heart'); // <--- EL TOQUE CLAVE: Para meter un icono de FontAwesome dinámico
            $table->integer('orden')->default(0); // Para controlar cuál se muestra primero
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interes');
    }
};
