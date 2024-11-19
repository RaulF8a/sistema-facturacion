@props(['producto'])

<div class="flex flex-row w-full h-auto gap-x-6">
    <a
        href="{{ route('producto.edit', ['producto' => $producto->id])}}"
        class="text-lg font-semibold underline text-orange-500"
    >
        Editar
    </a>
    <a
        href=""
        class="text-lg font-semibold underline text-red-600"
    >
        Eliminar
    </a>
</div>
