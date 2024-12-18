@props(['facturas', 'clientes'])

<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <h1 class="mt-4 text-2xl font-medium text-gray-900">
        Historial de Facturas
    </h1>

    <p class="mt-6 text-gray-500 leading-relaxed">
        Aqui se muestran las facturas que has creado a lo largo del tiempo junto a su folio,
        fecha, y el cliente.
    </p>
</div>

<div class="bg-gray-200 bg-opacity-25 p-6">
    <table class="table-fixed w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="text-left px-4 py-2 w-1/4">Folio</th>
                <th class="text-left px-4 py-2 w-1/4">Fecha</th>
                <th class="text-left px-4 py-2 w-1/4">Cliente</th>
                <th class="text-left px-4 py-2 w-1/4">Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($facturas as $factura)
                <tr class="hover:bg-gray-100">
                    <td class="border px-4 py-2">{{$factura->folio}}</td>
                    <td class="border px-4 py-2">{{$factura->fecha}}</td>
                    <td class="border px-4 py-2">
                        {{ collect($clientes)->firstWhere('id',
                        $factura->cliente_id)->nombre ?? 'Cliente no encontrado' }}
                    </td>
                    <td class="border px-4 py-2">
                        <a
                            class="underline text-blue-600"
                            href="{{ route('detalle.index', ['factura' => $factura]) }}"
                        >
                            Ver
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
