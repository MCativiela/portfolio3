<!-- Para traer los datos de la BD, uso Alpine.js, que hace el fetch desde el cliente -->
<header class="bg-white border-b border-gray-200 pt-12 pb-8 shadow-sm">
    <div class="max-w-6xl mx-left px-4" x-data="{ datos: {} }" x-init="datos = await (await fetch('/datosPersonales')).json()">
        <div class="flex flex-col md:flex-row items-center gap-8">
            <div class="shrink-0">
                <!-- Se usa el x-bind en Alpine. se le agregua ":" al src -->
                <img id="FotoPerfil" :src="`${datos.imagen}`"
                    alt="Foto del perfil"
                    class="w-32 h-32 md:w-44 md:h-44 rounded-full border-4 border-white shadow-xl object-cover ring-4 ring-blue-50">
            </div>

            <div class="grow text-center md:text-left">
                <h1 class="text-5xl font-extrabold text-gray-950 tracking-tight" x-text="datos.nombre">-Apellido y Nombre-</h1>
                <p class="text-2xl text-blue-600 font-semibold mt-1" x-text="datos.especialidad">-Especialidad-</p>

                <div class="flex flex-wrap justify-center md:justify-start gap-4 mt-4 text-gray-700 font-medium">
                    <i class="fas fa-map-marker-alt text-blue-500 mt-0.5"></i>
                    <span class="flex items-center gap-1" x-text="`${datos.ciudad}, ${datos.pais}`">-Ciudad, Pais-</span>
                    <i class="fas fa-envelope text-blue-500 mt-0.5"></i>
                    <span class="flex items-center gap-1" x-text="datos.e_mail">-E-Mail-</span>
                </div>
                <p class="mt-4 text-gray-600 leading-relaxed max-w-2xl" x-text="datos.descripcion">
                        -Descripción-
                </p>
            </div>
        </div>
    </div>
</header>

