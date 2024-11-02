<x-app-layout>
    <x-dashboard-content title="{{ 'Productos' }}">
        <div class="flex flex-wrap p-2 md:p-0 md:mx-10 my-2">
            <a href="{{ route('products.create') }}"
                class="text-white bg-blue hover:bg-lightBlue focus:ring-4 focus:ring-blue font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none">Nuevo
                <span><i class="fa-solid fa-plus"></i></span></a>
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
                    <section class=" md:hidden my-5 ">
                        <div class=" border-y border-zinc flex flex-col items-center justify-center">
                            <img src="{{ $item->imgUrl() }}" alt="{{ $item->title }}" class=" w-20 rounded-sm my-2">
                            <div class=" w-full pl-3">
                                <p class=" font-bold">Producto</p>
                                <p>{{ $item->title }}</p>
                            </div>
                            <div class=" w-full pl-3">
                                <p class=" font-bold">Slug</p>
                                <p>{{ $item->slug }}</p>
                            </div>
                            <div class=" w-full pl-3">
                                <p class=" font-bold">Descripción</p>
                                <p>{{ $item->description }}</p>
                            </div>

                            <div class=" w-full pl-3">
                                <p class=" font-bold">Precio</p>
                                <p>${{ number_format($item->price, 2, ',', '.') }}</p>
                            </div>

                            <div class=" w-full flex justify-around pl-3 py-2">
                                <a href="{{ route('products.edit', $item->id) }}" class="text-blue mx-2"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                                <form action="{{ route('products.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="text-red mx-2"><i
                                            class="fa-solid fa-trash"></i></button>
                                </form>
                            </div>

                        </div>
                    </section>
                @endforeach
                {{-- Desktop Version --}}
                <div class="hidden md:block w-full">
                    <table class="w-full">
                        <thead class="text-xs text-white uppercase bg-gray">
                            <tr>
                                <th scope="col" class="md:px-6 text-center px-2 py-3">
                                    Nombre del producto
                                </th>
                                <th scope="col" class="md:px-6 text-center px-2 py-3">
                                    Slug
                                </th>
                                <th scope="col" class="md:px-6 text-center px-2 py-3">
                                    Descripción
                                </th>
                                <th scope="col" class="md:px-6 text-center px-2 py-3">
                                    Precio
                                </th>
                                <th scope="col" class="md:px-6 text-center px-2 py-3">
                                    Imagen
                                </th>
                                <th scope="col" class="md:px-6 text-center px-2 py-3">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr class="border-y border-zinc">
                                    <td scope="row" class="py-2 text-center font-semibold">
                                        {{ $product->title }}
                                    </td>
                                    <td class="py-2 text-center overflow-x-hidden">
                                        {{ $product->slug }}
                                    </td>
                                    <td class="py-2 text-center overflow-x-hidden">
                                        {{ $product->description }}
                                    </td>
                                    <td class="py-2 text-center">
                                        ${{ number_format($product->price, 2, ',', '.') }}
                                    </td>
                                    <td class="py-2 text-center">
                                        <img src="{{ $product->imgUrl() }}" alt="{{ $product->tite }}"
                                            class=" w-10 mx-auto">
                                    </td>
                                    <td class="py-2 text-center">
                                        <a href="{{ route('products.edit', $product->id) }}" class="text-blue"><i
                                                class="fa-solid fa-pen-to-square"></i></a>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="text-red"><i
                                                    class="fa-solid fa-trash"></i></button>
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
                        <div class="bg-gray overflow-hidden w-full">
                            <div class="p-6 text-gray-900 dark:text-gray-100">
                                <p>Aún no hay productos cargados</p>
                            </div>
                        </div>
                    </div>
                </div>

            @endif
        </div>
        <script>
            const form = document.getElementById('categories');
            const select = document.getElementById('select-categories');

            select.addEventListener("change", () => {
                form.submit();
            })
        </script>

    </x-dashboard-content>

</x-app-layout>
