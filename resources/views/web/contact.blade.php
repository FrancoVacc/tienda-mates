<x-layout.layout-web>
    <main class="bg-white md:flex md:mt-5 md:mb-5 md:justify-around">
        <div class="p-2 md:w-[50%] z-0 sm:z-0">
            <x-maps-leaflet :centerPoint="['lat' => -33.150551, 'long' => -59.305123]" :markers="[['lat' => -33.150551, 'long' => -59.305123]]"></x-maps-leaflet>

        </div>
        </div>
        <div class="bg-black p-2 md:max-w-[50%] rounded-md m-2 md:m-0">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class=" bg-lightRed border-2 border-red rounded-md text-white font-bold p-2 my-2">
                        <p>{{ $error }}</p>
                    </div>
                @endforeach
            @endif
            <form action="{{ route('messages') }}" method="POST">
                @csrf
                <div class=" md:flex md:justify-between">
                    <div class="flex flex-col justify-start md:mr-1">
                        <label for="name" class=" font-semibold text-sm text-corduraLightGreen py-2">Nombre</label>
                        <input type="text" name="name" value="{{ isset($name) ? $name : null }}"
                            class="text-sm h-9 rounded-md text-black font-light px-3 py-2 border-0 border-b-2 border-b-corduraGreen focus:outline-none focus:border-b-corduraLightGreen focus:ring-0">
                    </div>
                    <div class="flex flex-col justify-start">
                        <label for="lastname"
                            class=" font-semibold text-sm text-corduraLightGreen py-2">Apellido</label>
                        <input type="text" name="lastname" value="{{ isset($lastname) ? $lastname : null }}"
                            class="text-sm h-9 rounded-md text-black font-light px-3 py-2 border-0 border-b-2 border-b-corduraGreen focus:outline-none focus:border-b-corduraLightGreen focus:ring-0">
                    </div>
                </div>
                <div class="flex flex-col justify-start">
                    <label for="email" class=" font-semibold text-sm text-corduraLightGreen py-2">Correo</label>
                    <input type="text" name="email" value="{{ isset($email) ? $email : null }}"
                        class="text-sm h-9 rounded-md text-black font-light px-3 py-2 border-0 border-b-2 border-b-corduraGreen focus:outline-none focus:border-b-corduraLightGreen focus:ring-0">
                </div>
                <div class="flex flex-col justify-start">
                    <label for="phone" class=" font-semibold text-sm text-corduraLightGreen py-2">Teléfono</label>
                    <input type="text" name="phone" value="{{ isset($phone) ? $phone : null }}"
                        class="text-sm h-9 rounded-md text-black font-light px-3 py-2 border-0 border-b-2 border-b-corduraGreen focus:outline-none focus:border-b-corduraLightGreen focus:ring-0">
                </div>
                <div class="flex flex-col justify-start">
                    <label for="message" class=" font-semibold text-sm text-corduraLightGreen py-2">Mensaje o
                        Consulta</label>
                    <textarea cols="20" rows="5" style="resize:none" name="message"
                        class="text-sm rounded-md text-black font-light px-3 py-2 border-0 border-b-2 border-b-corduraGreen focus:outline-none focus:border-b-corduraLightGreen focus:ring-0"></textarea>
                </div>
                <div class="flex align-middle mt-2">
                    <button type="submit"
                        class="bg-corduraLightGreen hover:bg-corduraGreen px-5 py-2 rounded-md mx-auto">Enviar</button>

                </div>
            </form>
        </div>
    </main>

</x-layout.layout-web>
