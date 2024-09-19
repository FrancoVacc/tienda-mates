<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="flex flex-wrap p-2 md:p-0 md:mx-10 my-2">
        <a href="{{ route('products.create') }}"
            class="text-white bg-blue hover:bg-lightBlue focus:ring-4 focus:ring-blue font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none">Nuevo</a>
        <form action="{{ route('products.index') }}" method="get" id="categories">

            <label for="categories">Categorias</label>
            <select name="categorie" id="select-categories">
                <option>-- Seleccione una Categoría --</option>
                <option value="0"> Mostrat Todo </option>
                @foreach ($categories as $categorie)
                    <option value="{{ $categorie->id }}">{{ $categorie->categorie }}</option>
                @endforeach
            </select>
        </form>
    </div>
    <div>
        @if (count($products))
            {{-- Mobile Version --}}
            @foreach ($products as $item)
                <section class=" md:hidden p-2 my-5 ">
                    <div class=" border border-gray rounded-sm flex flex-col items-center justify-center">

                        <img src="{{ asset('img/products/' . $item->img) }}" alt="{{ $item->img }}"
                            class=" w-20 rounded-sm my-2">
                        <div class=" w-full pl-3 border-t border-t-gray">
                            <p class=" font-bold">Producto</p>
                            <p>{{ $item->title }}</p>
                        </div>
                        <div class=" w-full pl-3 border-t border-t-gray">
                            <p class=" font-bold">Slug</p>
                            <p>{{ $item->slug }}</p>
                        </div>
                        <div class=" w-full pl-3 border-t border-t-gray">
                            <p class=" font-bold">Descripción</p>
                            <p>{{ $item->description }}</p>
                        </div>

                        <div class=" w-full pl-3 border-t border-t-gray">
                            <p class=" font-bold">Precio</p>
                            <p>${{ number_format($item->price, 2, ',', '.') }}</p>
                        </div>

                        <div class=" w-full pl-3 border-t border-t-gray py-2">
                            <a href="{{ route('products.edit', $item->id) }}"
                                class="font-medium px-3 py-1 bg-blue hover:bg-lightBlue rounded-md text-white">Editar</a>
                            <form action="{{ route('products.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <input type="submit" value="Eliminar"
                                    class="font-medium  mt-2 px-3 py-1 bg-red hover:bg-lightRed rounded-md text-white">
                            </form>
                        </div>

                    </div>
                </section>
            @endforeach
            {{-- Desktop Version --}}
            <div class="hidden md:block relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nombre del producto
                            </th>
                            <th scope="col" class="px-6 py-3 hidden md:table-cell">
                                Slug
                            </th>
                            <th scope="col" class="px-6 py-3 hidden md:table-cell">
                                Descripción
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Precio
                            </th>
                            <th scope="col" class="px-6 py-3 hidden md:table-cell">
                                Imagen
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr
                                class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $product->title }}
                                </th>
                                <td class="px-6 py-4 hidden md:table-cell">
                                    {{ $product->slug }}
                                </td>
                                <td class="px-6 py-4 hidden md:table-cell">
                                    {{ $product->description }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $product->price }}
                                </td>
                                <td class="px-6 py-4 hidden md:table-cell">
                                    <img src="{{ asset('img/products/' . $product->img) }}" alt="{{ $product->tite }}"
                                        class=" w-32 rounded-md">
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('products.edit', $product->id) }}"
                                        class="font-medium px-3 py-1 bg-blue hover:bg-lightBlue rounded-md text-white">Editar</a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" value="Eliminar"
                                            class="font-medium  mt-2 px-3 py-1 bg-red hover:bg-lightRed rounded-md text-white">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div>{{ $products->links() }}</div>
        @else
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <p>Aún no hay productos cargados</p>
                        </div>
                    </div>
                </div>
            </div>

        @endif
    </div>
</x-app-layout>
<script>
    const form = document.getElementById('categories');
    const select = document.getElementById('select-categories');

    select.addEventListener("change", () => {
        form.submit();
    })
</script>
