<!-- Recibir Propiedades -->
@props(['productos'])

<div class="bg-gray-200 bg-opacity-25 p-6">
    <table class="table-fixed w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="text-left px-4 py-2 w-1/4">ID</th>
                <th class="text-left px-4 py-2 w-1/4">Nombre</th>
                <th class="text-left px-4 py-2 w-1/4">Descripción</th>
                <th class="text-left px-4 py-2 w-1/4">Precio</th>
                <th class="text-left px-4 py-2 w-1/4">Impuesto</th>
                <th class="text-left px-4 py-2 w-1/4">Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                <tr class="hover:bg-gray-100">
                    <td class="border px-4 py-2">{{ $producto->id }}</td>
                    <td class="border px-4 py-2">{{ $producto->nombre }}</td>
                    <td class="border px-4 py-2">{{ $producto->descripcion }}</td>
                    <td class="border px-4 py-2">${{ $producto->precio }}</td>
                    <td class="border px-4 py-2">
                        @if ($producto->impuesto == 0)
                            No
                        @else
                            Si
                        @endif
                    </td>
                    <td class="border px-4 py-2"><x-action-icons /></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

