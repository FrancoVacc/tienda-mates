<x-app-layout>
    <x-dashboard-content title="{{ 'Categorías' }}">
        <div class="flex mx-10 my-2">
            <a href="{{ route('categories.create') }}"
                class="text-white bg-blue hover:bg-lightBlue focus:ring-4 focus:ring-blue font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none">Nuevo
                <span><i class="fa-solid fa-plus"></i></span></a>
        </div>
        <div>
            @if (count($categories))
                <div>
                    <table class="w-full">
                        <thead class="text-xs text-white uppercase bg-gray">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Categoría
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
                            @foreach ($categories as $category)
                                <tr class="border-y border-y-lightZinc">
                                    <th scope="row" class="py-2 text-center font-semibold">
                                        {{ $category->categorie }}
                                    </th>
                                    <td class="py-2 text-center overflow-x-hidden hidden md:table-cell">
                                        @if ($category->imgUrl() !== null)
                                            <img src="{{ $category->imgUrl() }}" alt="{{ $category->categorie }}"
                                                class=" w-10 mx-auto">
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <a href="{{ route('categories.edit', $category->id) }}" class="text-blue"><i
                                                class="fa-solid fa-pen-to-square"></i></a>
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
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
                <div>{{ $categories->links() }}</div>
            @else
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-gray overflow-hidden w-full">
                            <div class="p-6 text-gray-900 dark:text-gray-100">
                                <p>Aún no hay categorías cargadas</p>
                            </div>
                        </div>
                    </div>
                </div>

            @endif
        </div>

    </x-dashboard-content>

</x-app-layout>
