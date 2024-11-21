
<x-app-layout>
    <div class="py-12">
        <div class="text-center">
            <h1
                class="mb-8 text-4xl text-white tracking-widest
                uppercase font-bold"
            >
                Factura {{ $factura->folio }}
            </h1>

        </div>

        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-3 gap-4 gap-x-7">
                <div class="mt-2">
                    <x-label class="text-xl font-semibold" for="fecha" value="{{ __('Fecha') }}" />
                    <x-input id="fecha" class="block mt-1 w-full" type="date"
                    name="fecha" value="{{ $factura->fecha }}" readonly />
                </div>
                <div class=""></div>
                <div class=""></div>
            </div>

            <div class="mt-10">
                <div class="grid grid-cols-3 gap-4 gap-x-7">
                    <div class="mt-2">
                        <x-label class="text-xl font-semibold" for="cliente_nombre" value="{{ __('Cliente') }}" />
                        <x-input id="cliente_nombre" class="block mt-1 w-full" type="text"
                        name="cliente_nombre" value="{{ $cliente->nombre }}" readonly />
                    </div>

                    <div class="mt-2">
                        <x-label class="text-xl font-semibold" for="cliente_rfc" value="{{ __('RFC') }}" />
                        <x-input id="cliente_rfc" class="block mt-1 w-full" type="text"
                        name="cliente_rfc" value="{{ $cliente->rfc }}" readonly />
                    </div>

                    <div class="mt-2">
                        <x-label class="text-xl font-semibold" for="cliente_domicilio" value="{{ __('Domicilio') }}" />
                        <x-input id="cliente_domicilio" class="block mt-1 w-full" type="text"
                        name="cliente_domicilio" value="{{ $cliente->domicilio }}" readonly />
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-4 gap-x-7">
                    <div class="mt-2">
                        <x-label class="text-xl font-semibold" for="cliente_email" value="{{ __('Correo') }}" />
                        <x-input id="cliente_email" class="block mt-1 w-full" type="text"
                        name="cliente_email" value="{{ $cliente->email }}" readonly />
                    </div>

                    <div class="mt-2">
                        <x-label class="text-xl font-semibold" for="cliente_telefono" value="{{ __('Teléfono') }}" />
                        <x-input id="cliente_telefono" class="block mt-1 w-full" type="text"
                        name="cliente_telefono" value="{{ $cliente->telefono }}" readonly />
                    </div>

                    <div class="mt-2">
                        <x-label class="text-xl font-semibold" for="cliente_regimen" value="{{ __('Régimen') }}" />
                        <x-input id="cliente_regimen" class="block mt-1 w-full" type="text"
                        name="cliente_regimen" value="{{ ucwords($cliente->regimen) }}" readonly />
                    </div>
                </div>
            </div>

            <div class="mt-10">
                <div class="grid grid-cols-3 gap-4 gap-x-7">
                    <div class="mt-2">
                        <x-label class="text-xl font-semibold" for="empresa_nombre" value="{{ __('Empresa') }}" />
                        <x-input id="empresa_nombre" class="block mt-1 w-full" type="text"
                        name="empresa_nombre" value="{{ Auth::user()->name }}" readonly />
                    </div>

                    <div class="mt-2">
                        <x-label class="text-xl font-semibold" for="empresa_rfc" value="{{ __('RFC') }}" />
                        <x-input id="empresa_rfc" class="block mt-1 w-full" type="text"
                        name="empresa_rfc" value="{{ Auth::user()->rfc }}" readonly />
                    </div>

                    <div class="mt-2">
                        <x-label class="text-xl font-semibold" for="empresa_domicilio" value="{{ __('Domicilio') }}" />
                        <x-input id="empresa_domicilio" class="block mt-1 w-full" type="text"
                        name="empresa_domicilio" value="{{ Auth::user()->domicilio }}" readonly />
                    </div>
                </div>

                <div class="grid grid-cols-4 gap-4 gap-x-7">
                    <div class="mt-2">
                        <x-label class="text-xl font-semibold" for="empresa_email" value="{{ __('Correo') }}" />
                        <x-input id="empresa_email" class="block mt-1 w-full" type="text"
                        name="empresa_email" value="{{ Auth::user()->email }}" readonly />
                    </div>

                    <div class="mt-2">
                        <x-label class="text-xl font-semibold" for="empresa_telefono" value="{{ __('Teléfono') }}" />
                        <x-input id="empresa_telefono" class="block mt-1 w-full" type="text"
                        name="empresa_telefono" value="{{ Auth::user()->telefono }}" readonly />
                    </div>

                    <div class="mt-2">
                        <x-label class="text-xl font-semibold" for="empresa_regimen" value="{{ __('Régimen') }}" />
                        <x-input id="empresa_regimen" class="block mt-1 w-full" type="text"
                        name="empresa_regimen" value="{{ ucwords(Auth::user()->regimen) }}" readonly />
                    </div>

                    <div class="mt-2">
                        <x-label class="text-xl font-semibold" for="empresa_csd" value="{{ __('CSD') }}" />
                        <x-input id="empresa_csd" class="block mt-1 w-full" type="text"
                        name="empresa_csd" value="{{ ucwords(Auth::user()->csd) }}" readonly />
                    </div>
                </div>
            </div>

            <div class="mt-10">
                <x-label class="text-xl font-semibold" for="selected-products-table" value="{{ __('Productos') }}" />
                <table id="selected-products-table" class="table-fixed w-full border-collapse border
                border-gray-300 bg-white">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="text-left px-4 py-2 w-1/4">Nombre</th>
                            <th class="text-left px-4 py-2 w-1/4">Precio</th>
                            <th class="text-left px-4 py-2 w-1/4">Cantidad</th>
                            <th class="text-left px-4 py-2 w-1/4">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($detalles as $detalle)
                        @php
                            $producto = $productos->firstWhere('id', $detalle->producto_id);
                        @endphp
                        <tr>
                            <td class="border px-4 py-2">{{ $producto->nombre ?? 'N/A' }}</td>
                            <td class="border px-4 py-2">{{ $producto->precio ?? 'N/A' }}</td>
                            <td class="border px-4 py-2">{{ $detalle->cantidad }}</td>
                            <td class="border px-4 py-2">
                                ${{ $detalle->total }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="grid grid-cols-4 gap-4 gap-x-7 mt-10">
                <div class=""></div>
                <div class=""></div>
                <div class=""></div>
                <div class="mt-2">
                    <x-label class="text-xl font-semibold" for="total" value="{{ __('Total') }}" />
                    <x-input id="total" class="block mt-1 w-full" type="text"
                    name="total" value="${{ $factura->total }}" readonly />
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
