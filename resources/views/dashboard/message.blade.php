<x-app-layout>
    <x-dashboard-content title="{{ 'Mensajes' }}">
        <section class="md:w-[50%] w-[90%] mx-auto mt-5 ">
            <div class=" flex flex-col border border-gray rounded-md  p-5">
                <h3 class=" font-bold text-black">{{ $message->name . ' ' . $message->lastname }}</h3>
                <p class="p-5">{{ $message->message }}</p>
                <div class="flex flex-col">
                    <p>Email: {{ $message->email }}</p>
                    <p>Teléfono: {{ $message->phone }}</p>
                </div>
            </div>
            <div class="mt-5 flex flex-col  justify-between">
                <div class=" p-2 mt-2">
                    <a class="px-2 py-4 text-white bg-blue hover:bg-lightBlue rounded-md"
                        href="mailto:{{ $message->email }}">Responder
                        Email</a>
                </div>
                <div class=" p-2 mt-5">
                    <a class="px-2 py-4 text-white bg-blue hover:bg-lightBlue rounded-md"
                        href="https://wa.me/549{{ $message->phone }}/">Enviar Whatsapp</a>
                </div>
                <div class=" p-2 mt-2">
                    <form action="{{ route('message_delete', $message->id) }}" method="POST">
                        @method('delete')
                        @csrf
                        <input type="submit" value="Eliminar"
                            class="px-2 py-4 text-white bg-red hover:bg-lightRed rounded-md">
                    </form>

                </div>
            </div>

        </section>

    </x-dashboard-content>



</x-app-layout>
