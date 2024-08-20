<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mensajes') }}
        </h2>
    </x-slot>

    <section class="md:w-[50%] w-[90%] mx-auto mt-5 ">
        <div class=" flex flex-col border border-gray rounded-md  p-5">
            <h3 class=" font-bold text-black">{{ $message->name . ' ' . $message->lastname }}</h3>
            <p class="p-5">{{ $message->message }}</p>
            <div class="flex flex-col">
                <p>Email: {{ $message->email }}</p>
                <p>Teléfono: {{ $message->phone }}</p>
            </div>
        </div>
        <div class="flex flex-wrap justify-between mt-5">
            <div>
                <a class="px-2 py-4 text-white bg-blue hover:bg-lightBlue rounded-md"
                    href="mailto:{{ $message->email }}">Responder
                    Email</a>
            </div>
            <div>
                <a class="px-2 py-4 text-white bg-blue hover:bg-lightBlue rounded-md"
                    href="https://wa.me/549{{ $message->phone }}/">Enviar Whatsapp</a>
            </div>
        </div>

    </section>


</x-app-layout>
