<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mi Perfil') }}
        </h2>
    </x-slot>
    @session('message')
        <x-message-add :type="session('type')" :message="session('message')" />
    @endsession

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
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Dirección') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __('Actualiza tu Dirección personal') }}
                        </p>
                    </header>
                    <form action=" {{ route('address.update', $address->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="mt-5">
                            <x-input-label for="country" :value="__('Pais')" />
                            <input id="country" name="country" type="text" class="mt-1 block w-full"
                                value="{{ old('country', $address->country) }}" required autofocus
                                autocomplete="country" />
                            <x-input-error class="mt-2" :messages="$errors->get('country')" />
                        </div>
                        <div class="mt-5">
                            <x-input-label for="province" :value="__('Provincia')" />
                            <input id="province" name="province" type="text" class="mt-1 block w-full"
                                value="{{ old('province', $address->province) }}" required autofocus
                                autocomplete="province" />
                            <x-input-error class="mt-2" :messages="$errors->get('province')" />
                        </div>
                        <div class="mt-5">
                            <x-input-label for="city" :value="__('Ciudad')" />
                            <input id="city" name="city" type="text" class="mt-1 block w-full"
                                value="{{ old('city', $address->city) }}" required autofocus autocomplete="city" />
                            <x-input-error class="mt-2" :messages="$errors->get('city')" />
                        </div>
                        <div class="mt-5">
                            <x-input-label for="street" :value="__('Calle')" />
                            <input id="street" name="street" type="text" class="mt-1 block w-full"
                                value="{{ old('street', $address->street) }}" required autofocus
                                autocomplete="street" />
                            <x-input-error class="mt-2" :messages="$errors->get('street')" />
                        </div>
                        <div class="mt-5">
                            <x-input-label for="number" :value="__('Altura')" />
                            <input id="number" name="number" type="text" class="mt-1 block w-full"
                                value="{{ old('number', $address->number) }}" required autofocus
                                autocomplete="number" />
                            <x-input-error class="mt-2" :messages="$errors->get('number')" />
                        </div>
                        <div class="mt-5">
                            <x-input-label for="postcode" :value="__('Código Postal')" />
                            <input id="postcode" name="postcode" type="text" class="mt-1 block w-full"
                                value="{{ old('postcode', $address->postcode) }}" required autofocus
                                autocomplete="postcode" />
                            <x-input-error class="mt-2" :messages="$errors->get('postcode')" />
                        </div>
                        <div class="mt-5">
                            <x-input-label for="description" :value="__('Descripción')" />
                            <input id="description" name="description" type="text" class="mt-1 block w-full"
                                value="{{ old('description', $address->description) }}" required autofocus
                                autocomplete="description" />
                            <x-input-error class="mt-2" :messages="$errors->get('description')" />
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
    <script src="{{ asset('js/alertTimeout.js') }}"></script>
</x-app-layout>
