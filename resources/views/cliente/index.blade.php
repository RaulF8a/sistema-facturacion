<x-app-layout>
    <div class="py-12">
        <div class="text-center">
            <h1
                class="mb-8 text-4xl text-white tracking-widest
                uppercase font-bold"
            >
                Clientes
            </h1>

            <a href="{{route('cliente.create')}}">
                <button
                    class="text-xl text-white bg-success p-4 mb-8
                    font-bold"
                >
                    Agregar Cliente
                </button>
            </a>
        </div>

        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- Paso de propiedades -->
                <x-client-list :clientes="$clientes"></x-client-list>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('success') == 'ok')
    <script>
        Swal.fire({
            title: "Completado",
            text: "Acción realizada con éxito",
            icon: "success"
        });
    </script>
@endif
