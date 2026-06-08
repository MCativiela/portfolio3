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
        Schema::create('experiencias', function (Blueprint $table) {
            $table->id();
            $table->char('empresa', 50);
            $table->string('puesto');               // Agregamos puesto para que el CV sea más completo
            $table->text('descripcion');
            $table->date('desde');
            $table->date('hasta')->nullable();      // Nullable por si es el trabajo actual
            $table->char('logo', 50)->nullable();   // Opcional, como pediste
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiencias');
    }
};
