<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mis Clientes') }}
        </h2>
    </x-slot>
    @if (count($users))
        {{-- mobile version --}}
        <section class="p-2 md:hidden">
            @foreach ($users as $user)
                <div class="p-2 border border-gray">
                    <p class="font-bold">Nombre: <span class="font-normal">{{ $user->name }}</span></p>
                    <p class="font-bold">Apellido: <span
                            class="font-normal">{{ $user->user_information->lastname }}</span>
                    </p>
                    <p class="font-bold">Email: <span class="font-normal">{{ $user->email }}</span></p>
                    <p class="font-bold">Teléfono: <span class="font-normal">{{ $user->user_information->phone }}</span>
                    </p>
                    <p class="font-bold">Dirección: <span class="font-normal">
                            {{ $user->address->street . ' ' . $user->address->number . ' - ' . $user->address->city . ' ' . $user->address->province }}
                        </span>
                    </p>
                </div>
            @endforeach
        </section>
        {{-- Desktop version --}}
        <section class="hidden md:block lg:col-span-4 px-2 my-4 ">
            <table class="w-full text-sm text-left   border border-gray">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Nombre</th>
                        <th scope="col" class="px-6 py-3">Apellido</th>
                        <th scope="col" class="px-6 py-3">Email</th>
                        <th scope="col" class="px-6 py-3">Teléfono</th>
                        <th scope="col" class="px-6 py-3">Dirección</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="border-b border-gray">
                            <td class="px-6 py-4 ">{{ $user->name }}</td>
                            <td class="px-6 py-4 ">{{ $user->user_information->lastname }}</td>
                            <td class="px-6 py-4 ">{{ $user->email }}</td>
                            <td class="px-6 py-4 ">{{ $user->user_information->phone }}</td>
                            <td class="px-6 py-4 ">
                                {{ $user->address->street . ' ' . $user->address->number . ' - ' . $user->address->city . ' ' . $user->address->province }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
        <div>{{ $users->links() }}</div>
    @else
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <p>Aún no hay Clientes</p>
                    </div>
                </div>
            </div>
        </div>

    @endif
</x-app-layout>
