<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear Nuevo producto') }}
        </h2>
    </x-slot>
    <div class="md:w-[40%] p-5 mx-auto mt-5">
        <form action="/products" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col justify-start md:mr-1">
                <label for="title" class=" font-semibold text-sm text-black py-2">Titulo</label>
                <input type="text" name="title"
                    class="text-sm h-9  text-black font-light px-3 py-2 border-0 border-b-2 focus:outline-none focus:border-b-lightBlue focus:ring-0">
            </div>
            <div class="flex flex-col justify-start md:mr-1">
                <label for="slug" class=" font-semibold text-sm text-black py-2">Slug</label>
                <input type="text" name="slug"
                    class="text-sm h-9 text-black font-light px-3 py-2 border-0 border-b-2 focus:outline-none focus:border-b-lightBlue focus:ring-0">
            </div>
            <div class="flex flex-col justify-start md:mr-1">
                <label for="price" class=" font-semibold text-sm text-black py-2">Precio</label>
                <input type="number" name="price"
                    class="text-sm h-9 text-black font-light px-3 py-2 border-0 border-b-2 focus:outline-none focus:border-b-lightBlue focus:ring-0">
            </div>
            <div class="flex flex-col justify-start">
                <label for="description" class=" font-semibold text-sm text-black py-2">Mensaje o
                    Consulta</label>
                <textarea name="description" id="" cols="20" rows="5" style="resize:none"
                    class="text-sm  text-black font-light px-3 py-2 border-0 border-b-2 focus:outline-none focus:border-b-lightBlue focus:ring-0"></textarea>
            </div>
            <div class="flex flex-col justify-start md:mr-1">
                <label for="img" class=" font-semibold text-sm text-black py-2">Foto de portada</label>
                <input type="file" name="img"
                    class="text-sm h-9  font-light px-3 py-2  focus:outline-none  focus:ring-0">
            </div>
            <div class="flex align-middle mt-2">
                <button type="submit"
                    class="bg-purple hover:bg-lightPurple px-5 py-2 rounded-md mx-auto text-white">Guardar</button>

            </div>
        </form>
    </div>

</x-app-layout>
