<x-app-layout>
    <x-dashboard-content title="{{ 'Mensajes' }}">

        <div class="md:w-[40%] p-5 mx-auto mt-5">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class=" bg-lightRed border-2 border-red rounded-md text-white font-bold p-2 my-2">
                        <p>{{ $error }}</p>
                    </div>
                @endforeach
            @endif

            <form action="{{ route('categories.update', $categorie->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="flex flex-col justify-start md:mr-1">
                    <label for="categorie" class=" font-semibold text-sm text-black py-2">Nombre de la categoria</label>
                    <input type="text" name="categorie" value="{{ old('categorie', $categorie->categorie) }}"
                        id="category"
                        class="text-sm h-9  text-black font-light px-3 py-2 border-0 border-b-2 focus:outline-none focus:border-b-lightBlue focus:ring-0">
                </div>
                <div class="flex flex-col justify-start md:mr-1">
                    <label for="categorie" class=" font-semibold text-sm text-black py-2">Slug</label>
                    <input type="text" name="slug" value="{{ old('slug', $categorie->slug) }}" id="slug"
                        class="text-sm h-9  text-black font-light px-3 py-2 border-0 border-b-2 focus:outline-none focus:border-b-lightBlue focus:ring-0">
                </div>
                <div class="flex flex-col justify-start md:mr-1">
                    <label for="img" class=" font-semibold text-sm text-black py-2">Foto de portada</label>
                    <img src="{{ $categorie->imgUrl() }}" alt="{{ $categorie->categorie }}" class=" w-32 mx-auto">
                </div>
                <div class="flex flex-col justify-start md:mr-1">
                    <label for="img" class=" font-semibold text-sm text-black py-2">Foto de la categoria</label>
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
            const title = document.getElementById('category')
            const slug = document.getElementById('slug')

            title.addEventListener('blur', (e) => {

                const slugValue = title.value.toLowerCase();
                slug.value = slugValue.replaceAll(' ', '_');
            })
        </script>
    </x-dashboard-content>
</x-app-layout>
