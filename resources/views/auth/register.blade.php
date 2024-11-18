<x-guest-layout>
    <x-register-card>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="grid grid-cols-2 gap-4 gap-x-7">
                <div>
                    <x-label for="name" value="{{ __('Nombre de Empresa') }}" />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>

                <div>
                    <x-label for="email" value="{{ __('Correo') }}" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                </div>

                <div class="mt-4">
                    <x-label for="password" value="{{ __('Contraseña') }}" />
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <x-label for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" />
                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <x-label for="rfc" value="{{ __('RFC') }}" />
                    <x-input id="rfc" class="block mt-1 w-full" type="text" name="rfc" :value="old('rfc')" required />
                </div>

                <div class="mt-4">
                    <x-label for="csd" value="{{ __('CSD') }}" />
                    <x-input id="csd" class="block mt-1 w-full" type="text" name="csd" :value="old(key: 'csd')" required />
                </div>

                <div class="mt-4">
                    <x-label for="regimen" value="{{ __('Régimen') }}" />
                    <x-input id="regimen" class="block mt-1 w-full" type="text" name="regimen" :value="old(key: 'regimen')" required />
                </div>

                <div class="mt-4">
                    <x-label for="domicilio" value="{{ __('Domicilio') }}" />
                    <x-input id="domicilio" class="block mt-1 w-full" type="text" name="domicilio" :value="old('domicilio')" required />
                </div>

                <div class="mt-4">
                    <x-label for="telefono" value="{{ __('Teléfono') }}" />
                    <x-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono')" required />
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-white hover:text-gray-400 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('¿Ya tienes cuenta?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Registrarse') }}
                </x-button>
            </div>
        </form>
    </x-register-card>
</x-guest-layout>
