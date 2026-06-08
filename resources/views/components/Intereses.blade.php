<section
    x-data="interesesHandler()"
    x-init="fetchIntereses()"
    class="bg-white p-6 rounded-lg shadow-sm mb-6"
>
    <div class="flex items-center gap-2 mb-6">
        <i class="fas fa-heart text-blue-500 text-xl"></i>
        <h2 class="text-2xl font-bold text-gray-800 border-b-4 border-blue-400 inline-block">Intereses Personales</h2>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

        <template x-for="item in lista" :key="item.id">
            <div class="flex items-start gap-3 p-4 bg-gray-50 rounded-xl border border-gray-100 transition-all hover:shadow-sm hover:bg-red-50/10">

                <div class="shrink-0 w-10 h-10 bg-red-50 text-blue-400 rounded-lg flex items-center justify-center border border-red-100">
                    <i :class="'fas ' + (item.icono || 'fa-heart') + ' text-lg'"></i>
                </div>

                <div class="space-y-1">
                    <h3 class="font-bold text-gray-800 text-base" x-text="item.interes"></h3>
                    <p class="text-sm text-gray-600 leading-relaxed" x-text="item.descripcion"></p>
                </div>

            </div>
        </template>

    </div>

    <template x-if="lista.length === 0">
        <p class="text-gray-500 italic text-sm">No se cargaron intereses aún.</p>
    </template>
</section>

<script>
function interesesHandler() {
    return {
        lista: [],
        async fetchIntereses() {
            try {
                const response = await fetch('/datosIntereses');
                this.lista = await response.json();
            } catch (error) {
                console.error("Error cargando intereses:", error);
            }
        }
    }
}
</script>
