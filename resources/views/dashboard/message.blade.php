<x-app-layout>
    <x-dashboard-content title="{{ 'Mensajes' }}">
        <section class="md:w-[50%] w-[90%] bg-lightZinc rounded-md mx-auto mt-5">
            <div class=" flex flex-col  p-5">
                <h3 class=" font-bold text-black">{{ $message->name . ' ' . $message->lastname }}</h3>
                <p class="p-5">{{ $message->message }}</p>
                <div class="flex flex-col">
                    <p>Email: {{ $message->email }}</p>
                    <p>Teléfono: {{ $message->phone }}</p>
                </div>
            </div>
            <div class="mt-5 flex justify-center border-t border-t-white">
                <div class=" p-2">
                    <a class="text-blue" href="mailto:{{ $message->email }}">
                        <i class="fa-regular fa-envelope"></i>
                    </a>
                </div>
                <div class=" p-2">
                    <a class="text-green" href="https://wa.me/549{{ $message->phone }}/">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>
                </div>
                <div class=" p-2">
                    <form action="{{ route('message_delete', $message->id) }}" method="POST">
                        @method('delete')
                        @csrf
                        <button type="submit" class="text-red"><i class="fa-solid fa-trash"></i></button>
                    </form>

                </div>
            </div>

        </section>

    </x-dashboard-content>



</x-app-layout>
