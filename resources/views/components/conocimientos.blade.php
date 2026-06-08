
<section
    x-data="conocimientosHandler()"
    x-init="fetchConocimientos()"
    class="bg-white p-6 rounded-lg shadow-sm mb-6"
>
    <div class="flex items-center gap-2 mb-6">
        <i class="fas fa-chart-line text-blue-600 text-xl"></i>
        <h2 class="text-2xl font-bold text-gray-800 border-b-4 border-blue-500 inline-block">Tecnologías y Dominio</h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        <template x-for="categoria in categorias" :key="categoria">
            <div class="space-y-4 bg-gray-50/50 p-4 rounded-xl border border-gray-100/80">

                <div class="flex items-center gap-2 text-gray-800 font-bold border-b border-gray-200 pb-2 mb-2">
                    <i class="fas fa-layer-group text-blue-500"></i>
                    <h3 class="capitalize" x-text="categoria"></h3>
                </div>

                <template x-for="item in filtrar(categoria)" :key="item.id">
                    <div class="space-y-1">
                        <div class="flex justify-between text-sm font-semibold text-gray-700">
                            <span x-text="item.nombre"></span>
                            <span class="text-blue-600 font-bold" x-text="item.porcentaje + '%'"></span>
                        </div>

                        <!-- Modificación dentro del bucle x-for de conocimientos -->
                        <div class="w-full bg-gray-200 h-2 rounded-full overflow-hidden">
                            <!-- Usamos x-init para activar el ancho dinámico después de que el DOM esté listo -->
                            <div class="bg-blue-600 h-2 rounded-full transition-all duration-1000 ease-out"
                                x-init="$nextTick(() => { $el.style.width = item.porcentaje + '%' })"
                                style="width: 0%"></div>
                        </div>



                    </div>
                </template>

            </div>
        </template>

    </div>
</section>

<script>
function conocimientosHandler() {
    return {
        lista: [],
        categorias: [], // Acá guardaremos las categorías únicas
        async fetchConocimientos() {
            try {
                const response = await fetch('/datosConocimientos');
                this.lista = await response.json();

                // Extraemos las categorías de forma única usando un Set y las ordenamos
                this.categorias = [...new Set(this.lista.map(item => item.categoria))];
            } catch (error) {
                console.error("Error cargando conocimientos:", error);
            }
        },
        filtrar(cat) {
            return this.lista.filter(item => item.categoria === cat);
        }
    }
}
</script>
