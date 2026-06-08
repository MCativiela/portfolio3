<section
    x-data="educacionHandler()"
    x-init="fetchEducacion()"
    class="bg-white p-6 rounded-lg shadow-sm mb-6"
>
    <i class="fas fa-graduation-cap text-blue-600 text-xl"></i>
    <h2 class="text-3xl font-bold text-gray-950 mb-8 border-b-4 border-blue-500 inline-block pb-2">Educación</h2>

    <!-- Estado de Carga -->
    <template x-if="loading">
        <div class="space-y-4">
            <div class="h-4 bg-gray-200 rounded w-3/4 animate-pulse"></div>
            <div class="h-4 bg-gray-200 rounded w-1/2 animate-pulse"></div>
        </div>
    </template>

    <!-- Lista de Estudios -->
    <div class="space-y-6">
        <template x-for="estudio in estudios" :key="estudio.id">
            <div class="relative pl-6 border-l-2 border-blue-100">
                <!-- Puntito decorativo en la línea de tiempo -->
                <div class="absolute -left-[9px] top-1 w-4 h-4 bg-blue-500 rounded-full border-4 border-white shadow-sm"></div>

                <div class="flex flex-col md:flex-row md:justify-between md:items-start mb-1">
                    <h3 class="text-lg font-bold text-gray-900" x-text="estudio.titulo"></h3>
                    <span class="text-sm font-semibold text-blue-600 bg-blue-50 px-2 py-1 rounded" x-text="estudio.periodo"></span>
                </div>

                <p class="text-md text-gray-700 font-medium" x-text="estudio.institucion"></p>

                <p x-show="estudio.descripcion"
                   class="text-gray-600 mt-2 text-sm leading-relaxed"
                   x-text="estudio.descripcion"></p>
            </div>
        </template>
    </div>

    <!-- Mensaje si no hay datos -->
    <template x-if="!loading && estudios.length === 0">
        <p class="text-gray-500 italic">No se encontraron registros académicos.</p>
    </template>
</section>

<script>
function educacionHandler() {
    return {
        estudios: [],
        loading: true,
        async fetchEducacion() {
            this.loading = true;
            try {
                // Hacemos el fetch a la ruta que definimos en el controlador
                const response = await fetch('/datosEducacion');
                this.estudios = await response.json();
            } catch (error) {
                console.error("Error cargando educación:", error);
            } finally {
                this.loading = false;
            }
        }
    }
}
</script>
