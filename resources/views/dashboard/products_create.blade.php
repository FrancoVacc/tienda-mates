<x-app-layout>
    <x-dashboard-content title="{{ 'Producto Nuevo' }}">
        <div class="md:w-[40%] p-5 mx-auto mt-5">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class=" bg-lightRed border-2 border-red rounded-md text-white font-bold p-2 my-2">
                        <p>{{ $error }}</p>
                    </div>
                @endforeach
            @endif
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col justify-start md:mr-1">
                    <label for="title" class=" font-semibold text-sm text-black py-2">Titulo</label>
                    <input type="text" name="title" value="{{ old('title') }}" id="title"
                        class="text-sm h-9  text-black font-light px-3 py-2 border-0 border-b-2 focus:outline-none focus:border-b-lightBlue focus:ring-0">
                </div>
                <div class="flex flex-col justify-start md:mr-1">
                    <label for="slug" class=" font-semibold text-sm text-black py-2">Slug</label>
                    <input type="text" name="slug" value="{{ old('slug') }}" id="slug"
                        class="text-sm h-9 text-black font-light px-3 py-2 border-0 border-b-2 focus:outline-none focus:border-b-lightBlue focus:ring-0">
                </div>
                <div class="flex flex-col justify-start md:mr-1">
                    <label for="price" class=" font-semibold text-sm text-black py-2">Precio</label>
                    <input type="number" name="price" value="{{ old('price') }}"
                        class="text-sm h-9 text-black font-light px-3 py-2 border-0 border-b-2 focus:outline-none focus:border-b-lightBlue focus:ring-0">
                </div>
                <div class="flex flex-col align-middle md:mr-1">
                    <label for="available" class=" font-semibold text-sm text-black py-2">Disponible</label>
                    <input type="checkbox" name="available" value="true">
                </div>
                <div class="flex flex-col justify-start md:mr-1">
                    <label for="categorie" class=" font-semibold text-sm text-black py-2">Categoría</label>
                    <select name="categorie" value="{{ old('price') }}"
                        class="text-sm h-9 text-black font-light px-3 py-2 border-0 border-b-2 focus:outline-none focus:border-b-lightBlue focus:ring-0">
                        <option>-- Seleccione una opción --</option>
                        @foreach ($category as $item)
                            <option value="{{ $item->id }}">{{ $item->categorie }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex flex-col justify-start">
                    <label for="description" class=" font-semibold text-sm text-black py-2">Descripción del
                        producto</label>
                    <textarea name="description" id="" cols="20" rows="5" style="resize:none"
                        class="text-sm  text-black font-light px-3 py-2 border-0 border-b-2 focus:outline-none focus:border-b-lightBlue focus:ring-0">{{ old('description') }}</textarea>
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

        <script>
            const title = document.getElementById('title')
            const slug = document.getElementById('slug')

            title.addEventListener('blur', (e) => {

                const slugValue = title.value.toLowerCase();
                slug.value = slugValue.replaceAll(' ', '_');
            })
        </script>

    </x-dashboard-content>
</x-app-layout>
