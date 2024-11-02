<x-app-layout>
    <x-dashboard-content title="{{ 'Mensajes' }}">
        @session('message')
            <x-message-add :type="session('type')" :message="session('message')" />
        @endsession
        {{--  New Messages --}}
        @if (count($new_messages))
            <section class="md:p-4  p-2 ">
                <h2 class="font-semibold mb-5 leading-tight">Mensajes Nuevos</h2>
                @foreach ($new_messages as $message)
                    <a href="{{ route('messages_read', $message->id) }}"
                        class=" w-full border-y border-zinc md:grid md:grid-cols-6  py-1">
                        <p class=" md:col-span-2 font-semibold whitespace-nowrap">
                            {{ $message->name . ' ' . $message->lastname }}</p>
                        <p class=" md:col-span-2 whitespace-nowrap">
                            {{ $message->email }}</p>
                        <p class=" md:col-span-2 whitespace-nowrap line-clamp-1">
                            {{ $message->message }}</p>
                    </a>
                @endforeach

            </section>
        @endif

        {{-- Old Messages --}}
        @if (count($old_messages))
            <section class="md:p-4  p-2">
                <h2 class="font-semibold mb-5 leading-tight">Mensajes Vistos</h2>

                @foreach ($old_messages as $message)
                    <a href="{{ route('messages_read', $message->id) }}"
                        class=" w-full border-y border-zinc md:grid md:grid-cols-6  py-1">
                        <p class=" md:col-span-2 font-semibold whitespace-nowrap">
                            {{ $message->name . ' ' . $message->lastname }}</p>
                        <p class=" md:col-span-2 whitespace-nowrap">
                            {{ $message->email }}</p>
                        <p class=" md:col-span-2 whitespace-nowrap line-clamp-1">
                            {{ $message->message }}</p>
                    </a>
                @endforeach

            </section>
        @endif
        <script src="{{ asset('js/alertTimeout.js') }}"></script>

    </x-dashboard-content>
</x-app-layout>
