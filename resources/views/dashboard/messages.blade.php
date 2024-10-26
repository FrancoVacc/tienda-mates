<x-app-layout>
    <x-dashboard-content title="{{ 'Mensajes' }}">
        @session('message')
            <x-message-add :type="session('type')" :message="session('message')" />
        @endsession
        {{--  New Messages --}}
        @if (count($new_messages))
            <section class="md:p-4  p-2 ">
                <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">Mensajes Nuevos</h2>
                <table
                    class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border-b border-b-gray">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nombre y apellido
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Teléfono
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    @foreach ($new_messages as $message)
                        <tr class="odd:bg-white  even:bg-gray-50 ">
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $message->name . ' ' . $message->lastname }}</td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $message->email }}</td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $message->phone }}</td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"><a
                                    href="{{ route('messages_read', $message->id) }}"
                                    class=" bg-purple hover:bg-lightPurple py-2 px-5 rounded-md text-center text-white">Ver</a>
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                <form action="{{ route('message_delete', $message->id) }}" method="POST">
                                    @method('delete')
                                    @csrf

                                    <input type="submit" value="Eliminar"
                                        class=" bg-red hover:bg-lightRed py-2 px-5 rounded-md text-center text-white">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>

            </section>
        @endif

        {{-- Old Messages --}}
        @if (count($old_messages))
            <section class="md:p-4  p-2">
                <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">Mensajes Vistos</h2>
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nombre y apellido
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Teléfono
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    @foreach ($old_messages as $message)
                        <tr class="odd:bg-white  even:bg-gray-50  ">
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $message->name . ' ' . $message->lastname }}</td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $message->email }}</td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $message->phone }}</td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"><a
                                    href="{{ route('messages_read', $message->id) }}"
                                    class=" bg-purple hover:bg-lightPurple py-2 px-5 rounded-md text-center text-white">Ver</a>
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                <form action="{{ route('message_delete', $message->id) }}" method="POST">
                                    @method('delete')
                                    @csrf

                                    <input type="submit" value="Eliminar"
                                        class=" bg-red hover:bg-lightRed py-2 px-5 rounded-md text-center text-white">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>

            </section>
        @endif
        <script src="{{ asset('js/alertTimeout.js') }}"></script>

    </x-dashboard-content>
</x-app-layout>
