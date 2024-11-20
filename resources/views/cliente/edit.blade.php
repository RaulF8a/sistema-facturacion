<x-app-layout>
    <div class="bg-input w-1/2 rounded p-10">
        <h1 class="text-2xl text-white text-center font-bold
            uppercase tracking-wider mt-4 mb-4">
            Editar Cliente
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

        <form
            method="post"
            action="{{ route('cliente.update', ['cliente' => $cliente]) }}"
        >
            @csrf
            @method('put')

            <div class="grid grid-cols-2 gap-4 gap-x-7">
                <div>
                    <x-label for="nombre" value="{{ __('Nombre') }}" />
                    <x-input id="nombre" class="block mt-1 w-full" type="text"
                    name="nombre" value="{{$cliente->nombre}}" required autofocus />
                </div>

                <div>
                    <x-label for="email" value="{{ __('Correo') }}" />
                    <x-input id="email" value="{{$cliente->email}}"
                    class="block mt-1 w-full" type="email" name="email" required />
                </div>

                <div class="mt-4">
                    <x-label for="rfc" value="{{ __('RFC') }}" />
                    <x-input id="rfc" class="block mt-1 w-full" type="text"
                    name="rfc" required value="{{$cliente->rfc}}" />
                </div>

                <div class="mt-4">
                    <x-label for="domicilio" value="{{ __('Domicilio') }}" />
                    <x-input id="domicilio" class="block mt-1 w-full"
                    type="text" name="domicilio" value="{{$cliente->domicilio}}" required />
                </div>

                <div class="mt-4">
                    <x-label for="telefono" value="{{ __('Teléfono') }}" />
                    <x-input id="telefono" class="block mt-1 w-full"
                    type="text" name="telefono" value="{{$cliente->telefono}}" required />
                </div>

                <div class="mt-4">
                    <x-label for="regimen" value="{{ __('Régimen') }}" />
                    <select name="regimen" class="border-gray-300 focus:border-gray-400
                        focus:ring-gray-400 rounded-md shadow-sm block
                        mt-1 w-full">
                        <option
                            value="asalariados"
                            @if ($cliente->regimen == 'asalariados') selected @endif
                        >
                            Asalariados
                        </option>
                        <option
                            value="honorarios"
                            @if ($cliente->regimen == 'honorarios') selected @endif
                        >
                            Honorarios
                        </option>
                        <option
                            value="arrendamiento"
                            @if ($cliente->regimen == 'arrendamiento') selected @endif
                        >
                            Arrendamiento
                        </option>
                    </select>
                </div>
            </div>

            <div class="flex items-center justify-center mt-4">
                <div class="text-white text-lg text-center font-semibold
                    bg-orange-500 w-1/2 mt-6 justify-center">
                    <button type="submit">Editar</button>
                </div>
            </div>

        </form>
    </div>

</x-app-layout>