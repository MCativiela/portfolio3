<div
    x-data="enlacesHandler()"
    x-init="fetchEnlaces()"
    class="flex flex-col gap-3 w-full"
>
    <a href="/cv_martin_cativiela.pdf"
        download="CV_Martin_Cativiela.pdf"
        target="_blank"
        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 px-4 rounded-md shadow-sm transition-colors text-center text-sm flex items-center justify-center gap-2">
        <i class="fas fa-download"></i>
        Descargar CV
    </a>

    <a href="#" class="w-full bg-white hover:bg-gray-50 text-gray-700 font-semibold py-2.5 px-4 rounded-md border border-gray-300 shadow-sm transition-colors text-center text-sm flex items-center justify-center gap-2">
        <i class="fas fa-envelope text-gray-400"></i>
        Contacto
    </a>

    <!-- ================= VENTANA MODAL FLOTANTE ================= -->
    <div
        x-show="abrirModal"
        class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm"
        x-transition
        x-cloak
    >
        <!-- Caja del Formulario -->
        <div
            @click.away="if(!enviando) abrirModal = false"
            class="bg-white rounded-xl shadow-2xl w-full max-w-md p-6 border border-gray-100"
        >
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                    <i class="fas fa-paper-plane text-blue-500"></i> Enviar Mensaje
                </h3>
                <button @click="abrirModal = false" :disabled="enviando" class="text-gray-400 hover:text-gray-600 text-lg">&times;</button>
            </div>

            <!-- Formulario -->
            <form @submit.prevent="enviarFormulario()" class="space-y-4">
                <div>
                    <label class="block text-xs font-bold text-gray-600 uppercase mb-1">Tu Correo Electrónico</label>
                    <input type="email" x-model="form.correo" required class="w-full p-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-600 uppercase mb-1">Asunto</label>
                    <input type="text" x-model="form.asunto" required class="w-full p-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-600 uppercase mb-1">Mensaje</label>
                    <textarea x-model="form.mensaje" required rows="4" class="w-full p-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-blue-500 resize-none"></textarea>
                </div>

                <!-- Botón de Envío Dinámico -->
                <button
                    type="submit"
                    :disabled="enviando"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 rounded-lg text-sm transition-all flex items-center justify-center gap-2"
                >
                    <i class="fas animate-spin fa-spinner" x-show="enviando"></i>
                    <span x-text="enviando ? 'Enviando...' : 'Enviar Mensaje'"></span>
                </button>
            </form>

            <!-- Alerta de Éxito -->
            <div x-show="exito" x-transition class="mt-4 p-3 bg-green-50 border border-green-200 text-green-700 text-sm rounded-lg text-center font-medium">
                ¡Mensaje enviado con éxito! Te responderé pronto.
            </div>
        </div>
    </div>





    <template x-if="lista.length > 0">
        <hr class="border-gray-200 my-2">
    </template>

    <template x-for="link in lista" :key="link.id">
        <div class="relative group w-full">

            <a
                :href="link.url"
                target="_blank"
                class="w-full bg-gray-800 hover:bg-gray-900 text-gray-100 font-medium py-2.5 px-4 rounded-md shadow-sm transition-all text-center text-sm flex items-center justify-center gap-2"
            >
                <template x-if="link.icono">
                    <i :class="'fas ' + link.icono"></i>
                </template>

                <span x-text="link.texto"></span>
            </a>

            <div class="absolute z-50 pointer-events-none opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-gray-900 text-white text-xs rounded-md py-2 px-3 shadow-xl border border-gray-700
                        left-full top-1/2 -translate-y-1/2 ml-3 w-48 hidden md:block">
                <div class="absolute right-full top-1/2 -translate-y-1/2 border-8 border-transparent border-r-gray-900"></div>
                <span x-text="link.tooltip"></span>
            </div>

        </div>
    </template>
</div>

<script>
function enlacesHandler() {
    return {
        lista: [],
        abrirModal: false,
        enviando: false,
        exito: false,
        form: { correo: '', asunto: '', mensaje: '' },

        async fetchEnlaces() {
            try {
                const response = await fetch('/datosEnlaces');
                this.lista = await response.json();
            } catch (error) {
                console.error("Error:", error);
            }
        },

        async enviarFormulario() {
            this.enviando = true;
            this.exito = false;

            try {
                const response = await fetch('/enviarContacto', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify(this.form)
                });

                if (response.ok) {
                    this.exito = true;
                    this.form = { correo: '', asunto: '', mensaje: '' }; // Limpiar
                    setTimeout(() => { this.abrirModal = false; this.exito = false; }, 3000);
                }
            } catch (error) {
                console.error("Error enviando el correo:", error);
            } finally {
                this.enviando = false;
            }
        }
    }
}
 </script>
