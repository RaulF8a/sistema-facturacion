<x-app-layout>
    <div class="bg-input w-1/2 rounded p-10">
        <h1
            class="text-2xl text-white text-center font-bold
            uppercase tracking-wider mt-4 mb-4"
        >
            Crear Producto
        </h1>

        <div>
            @if ($errors->any())
            <ul>
                @foreach ($errors->all as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif
        </div>

        <!-- Dentro del action, colocamos el nombre de la ruta POST que carga
         el producto a la BD. El que aparece en ->name('producto.algo') en route/web.php -->
        <form method="post" action="{{ route('producto.store') }}">
            @csrf
            @method('post')

            <div class="mt-2">
                <x-label for="nombre" value="{{ __('Nombre') }}" />
                <x-input id="nombre" class="block mt-1 w-full" type="text"
                name="nombre" :value="old('nombre')" required autofocus />
            </div>

            <div class="mt-2">
                <x-label for="descripcion" value="{{ __('Descripción') }}" />
                <x-input id="descripcion" class="block mt-1 w-full" type="text"
                name="descripcion" :value="old('descripcion')" required />
            </div>

            <div class="mt-2">
                <x-label for="precio" value="{{ __('Precio') }}" />
                <x-input id="precio" class="block mt-1 w-full" type="text"
                name="precio" :value="old('precio')" required />
            </div>

            <div class="mt-2">
                <x-label for="impuesto" value="{{ __('Impuesto') }}" />
                <select
                    name="impuesto"
                    class="border-gray-300 focus:border-gray-400
                    focus:ring-gray-400 rounded-md shadow-sm block
                    mt-1 w-full"
                >
                    <option value="1">Si</option>
                    <option value="0" @if (old('impuesto') == 2) selected @endif>No</option>
                </select>
            </div>

            <div
                class="text-white text-lg text-center font-semibold
                bg-success w-1/2 mt-6 mb-6 justify-center"
            >
                <button type="submit">Crear</button>
            </div>
        </form>
    </div>

</x-app-layout>

