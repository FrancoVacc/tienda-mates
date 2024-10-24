<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Categorías') }}
        </h2>
    </x-slot>

    <div class="flex mx-10 my-2">
        <a href="{{ route('categories.create') }}"
            class="text-white bg-blue hover:bg-lightBlue focus:ring-4 focus:ring-blue font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none">Nuevo</a>
    </div>
    <div>
        @if (count($categories))
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Categoría
                            </th>
                            <th scope="col" class="px-6 py-3 hidden md:table-cell">
                                Imagen
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr
                                class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $category->categorie }}
                                </th>
                                <td class="px-6 py-4 hidden md:table-cell">
                                    @if ($category->imgUrl() !== null)
                                        <img src="{{ $category->imgUrl() }}" alt="{{ $category->categorie }}"
                                            class=" w-32 rounded-md">
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('categories.edit', $category->id) }}"
                                        class="font-medium px-3 py-1 bg-blue hover:bg-lightBlue rounded-md text-white">Editar</a>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
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
            <div>{{ $categories->links() }}</div>
        @else
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <p>Aún no hay categorías cargadas</p>
                        </div>
                    </div>
                </div>
            </div>

        @endif
    </div>
</x-app-layout>
