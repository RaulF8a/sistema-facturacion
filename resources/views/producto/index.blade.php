<x-app-layout>
    <div class="py-12">
        <div class="text-center">
            <h1
                class="mb-8 text-4xl text-white tracking-widest
                uppercase font-bold"
            >
                Productos
            </h1>

            <a href="{{route('producto.create')}}">
                <button
                    class="text-xl text-white bg-success p-4 mb-8
                    font-bold"
                >
                    Agregar Producto
                </button>
            </a>
        </div>

        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- Paso de propiedades -->
                <x-product-list :productos="$productos"></x-product-list>
            </div>
        </div>
    </div>
</x-app-layout>
