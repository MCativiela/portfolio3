<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void  {
        Schema::create('datos_personales', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->string('especialidad', 50);
            $table->string('descripcion', 200);
            $table->text('sobre_mi');
            $table->string('domicilio', 50);
            $table->string('e_mail', 50);
            $table->string('ciudad', 50);
            $table->string('provincia', 50);
            $table->string('pais', 50);

            // El campo para la foto (guardamos la ruta del archivo)
            $table->string('imagen')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datos_personales');
    }
};
