<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mi Perfil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Información Personal') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __('Actualiza tu información personal') }}
                        </p>
                    </header>
                    <form action=" {{ route('userinformation.update', $user_information->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="mt-5">
                            <x-input-label for="lsatname" :value="__('Apellido')" />
                            <input id="lastname" name="lastname" type="text" class="mt-1 block w-full"
                                value="{{ old('lastname', $user_information->lastname) }}" required autofocus
                                autocomplete="lastname" />
                            <x-input-error class="mt-2" :messages="$errors->get('lastname')" />
                        </div>
                        <div class="mt-5">
                            <x-input-label for="phone" :value="__('Teléfono')" />
                            <input id="phone" name="phone" type="text" class="mt-1 block w-full"
                                value="{{ old('phone', $user_information->phone) }}" required autofocus
                                autocomplete="phone" />
                            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                        </div>
                        <div class="mt-5">
                            <x-input-label for="dni" :value="__('Número de Documento')" />
                            <input id="dni" name="dni" type="text" class="mt-1 block w-full"
                                value="{{ old('dni', $user_information->dni) }}" required autofocus
                                autocomplete="dni" />
                            <x-input-error class="mt-2" :messages="$errors->get('dni')" />
                        </div>
                        <div class="flex items-center gap-4 mt-5">
                            <x-primary-button>{{ __('Guardar') }}</x-primary-button>

                            @if (session('status') === 'profile-updated')
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </form>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
