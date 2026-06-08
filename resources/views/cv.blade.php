<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Martín Cativiela - CV</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link rel="icon" type="image/jpg" href="{{ asset('images/perfil.jpg') }}">

        <!-- En el <head> de cv.blade.php -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

        <script>
            AOS.init({
                duration: 800, // Duración de la animación en milisegundos (0.8 segundos)
                once: true,    // true: la animación pasa una sola vez; false: se repite cada vez que subís y bajás
                offset: 100,   // Distancia (en px) desde el elemento para que se dispare la animación
            });
        </script>
    </head>

    <x-cabecera/>

    <hr class="border-gray-200 mb-8">
        <div class="flex flex-col md:flex-row gap-8">
            <!-- Botonera -->
            <aside class="w-full md:w-64">
                <x-botonera/>
            </aside>

            <div class="flex-1 flex flex-col gap-6">
                <!-- Componenentes -->
                <x-sobre-mi/>
                <x-Educacion/>
                <x-experiencia/>
                <x-conocimientos/>
                <x-Intereses/>
            </div>



        </div>

    <x-pie/>
</html>
