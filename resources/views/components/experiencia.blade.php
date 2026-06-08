<section
    x-data="experienciaHandler()"
    x-init="fetchExperiencias()"
    class="bg-white p-6 rounded-lg shadow-sm mb-6"
>
    <div class="flex items-center gap-2 mb-6">
        <i class="fas fa-briefcase text-blue-600 text-xl"></i>
        <h2 class="text-2xl font-bold text-gray-800 border-b-4 border-blue-500 inline-block">Experiencia Laboral</h2>
    </div>

    <template x-if="loading">
        <div class="space-y-4 animate-pulse">
            <div class="flex gap-4">
                <div class="w-12 h-12 bg-gray-200 rounded-md"></div>
                <div class="flex-1 space-y-2 py-1">
                    <div class="h-4 bg-gray-200 rounded w-1/4"></div>
                    <div class="h-4 bg-gray-200 rounded w-3/4"></div>
                </div>
            </div>
        </div>
    </template>

    <div class="space-y-6">
        <template x-for="exp in lista" :key="exp.id">
            <div class="flex items-start gap-4 p-4 rounded-md hover:bg-gray-50 transition-colors">

                <div class="shrink-0">
                    <template x-if="exp.logo">
                        <img :src="'/storage/logos/' + exp.logo"
                             :alt="'Logo de ' + exp.empresa"
                             class="w-12 h-12 md:w-16 md:h-16 object-contain rounded-md border border-gray-100 bg-white p-1 shadow-sm">
                    </template>

                    <template x-if="!exp.logo">
                        <div class="w-12 h-12 md:w-16 md:h-16 bg-blue-50 border border-blue-100 flex items-center justify-center rounded-md shadow-sm">
                            <i class="fas fa-building text-blue-400 text-lg md:text-xl"></i>
                        </div>
                    </template>
                </div>

                <div class="flex-1 min-w-0">
                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start gap-1">
                        <div>
                            <h3 class="text-lg font-bold text-gray-900" x-text="exp.puesto"></h3>
                            <p class="text-md font-semibold text-gray-600" x-text="exp.empresa"></p>
                        </div>

                        <span class="inline-flex items-center text-xs font-semibold text-blue-600 bg-blue-50 px-2.5 py-1 rounded-full sm:mt-1 shrink-0 self-start">
                            <i class="far fa-calendar-alt mr-1"></i>
                            <span x-text="formatDate(exp.desde)"></span>
                            <span class="mx-1">-</span>
                            <span x-text="exp.hasta ? formatDate(exp.hasta) : 'Presente'"></span>
                        </span>
                    </div>

                    <p class="text-gray-600 mt-2 text-sm leading-relaxed whitespace-pre-line" x-text="exp.descripcion"></p>
                </div>

            </div>
        </template>
    </div>

    <template x-if="!loading && lista.length === 0">
        <p class="text-gray-500 italic">No se cargaron experiencias laborales aún.</p>
    </template>
</section>

<script>
function experienciaHandler() {
    return {
        lista: [],
        loading: true,
        async fetchExperiencias() {
            this.loading = true;
            try {
                const response = await fetch('/datosExperiencia');
                this.lista = await response.json();
            } catch (error) {
                console.error("Error al traer experiencias:", error);
            } finally {
                this.loading = false;
            }
        },
        // Helper simple para formatear las fechas que vienen de la BD (YYYY-MM-DD a MM/YYYY)
        formatDate(dateString) {
            if (!dateString) return '';
            const date = new Date(dateString);
            // Sumamos un día por el desajuste de zona horaria UTC al parsear strings
            date.setDate(date.getDate() + 1);
            const mes = String(date.getMonth() + 1).padStart(2, '0');
            const anio = date.getFullYear();
            return `${mes}/${anio}`;
        }
    }
}
</script>
