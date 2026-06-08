
<div class="bg-white p-6 rounded-lg shadow mb-6" x-data="{ datos: {} }" x-init="datos = await (await fetch('/datosPersonales')).json()">
    <!-- Título de la sección-->
    <i class="fas fa-user text-blue-600 text-xl"></i>
    <h2
        class="text-3xl font-bold text-gray-950 mb-8 border-b-4 border-blue-500 inline-block pb-2"
    >Sobre mi</h2>

    <div class="flex flex-col gap-2">
        <textarea
            x-model="datos.sobre_mi"
            id="sobre_mi"
            rows="8"
            class="border border-gray-300 rounded-md p-3 focus:ring-2 focus:ring-blue-500 outline-none transition"
            placeholder="Escribe tu biografía profesional..."
            readonly
        >
        </textarea>
    </div>
</div>
