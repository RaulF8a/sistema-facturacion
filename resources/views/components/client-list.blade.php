<!-- Recibir Propiedades -->
@props(['clientes'])

<div class="bg-gray-200 bg-opacity-25 p-6">
    <table class="table-fixed w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="text-left px-4 py-2 w-10">ID</th>
                <th class="text-left px-4 py-2 w-1/4">Nombre</th>
                <th class="text-left px-4 py-2 w-1/4">RFC</th>
                <th class="text-left px-4 py-2 w-1/4">Domicilio</th>
                <th class="text-left px-4 py-2 w-1/4">Regimen</th>
                <th class="text-left px-4 py-2 w-1/4">Telefono</th>
                <th class="text-left px-4 py-2 w-1/4">Email</th>
                <th class="text-left px-4 py-2 w-1/4">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
                <tr class="hover:bg-gray-100">
                    <td class="border px-4 py-2">{{ $cliente->id }}</td>
                    <td class="border px-4 py-2">{{ $cliente->nombre }}</td>
                    <td class="border px-4 py-2">{{ $cliente->rfc }}</td>
                    <td class="border px-4 py-2">{{ $cliente->domicilio }}</td>
                    <td class="border px-4 py-2">{{ ucwords($cliente->regimen) }}</td>
                    <td class="border px-4 py-2">{{ $cliente->telefono }}</td>
                    <td class="border px-4 py-2">{{ $cliente->email }}</td>
                    <td class="border px-4 py-2">
                        <x-client-action-icons :cliente="$cliente" />
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
