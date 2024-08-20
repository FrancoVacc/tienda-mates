<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <main class=" flex px-2 py-5 md:grid md:grid-cols-6 md:p-5 ">
        <a href="{{ route('messages_show') }}" class=" md:col-span-1 border border-black p-5 rounded-md mx-auto w-full">
            <div>
                <h3>Mensajes</h3>
            </div>
        </a>
    </main>

</x-app-layout>
