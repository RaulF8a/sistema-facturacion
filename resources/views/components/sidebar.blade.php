
<div
    class="fixed top-0 left-0 h-full w-64 bg-black text-white
    p-4 flex flex-col justify-between"
>
    <div>
        <h2 class="text-xl px-4 font-bold">Menú</h2>
    </div>

    <ul class="space-y-2">
        <li>
            <a
                href="#"
                class="block px-4 py-2 hover:bg-gray-600 rounded"
            >
                Inicio
            </a>
        </li>
        <li>
            <a
                href="#"
                class="block px-4 py-2 hover:bg-gray-600 rounded"
            >
                Clientes
            </a>
        </li>
        <li>
            <a
                href="{{route('producto.index')}}"
                class="block px-4 py-2 hover:bg-gray-600 rounded"
            >
                Productos
            </a>
        </li>
    </ul>

    <form method="POST" action="{{ route('logout') }}" x-data>
        @csrf

        <p class="px-4 font-semibold">{{ Auth::user()->name }}</p>

        <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
            {{ __('Cerrar Sesión') }}
        </x-dropdown-link>
    </form>
</div>
