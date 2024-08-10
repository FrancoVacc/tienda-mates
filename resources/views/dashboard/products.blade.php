<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="flex mx-10 my-2">
        <a href="{{ route('products.create') }}"
            class="text-white bg-blue hover:bg-lightBlue focus:ring-4 focus:ring-blue font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none">Nuevo</a>
    </div>
    <div>
        @if (count($products))
            <ul>
                @foreach ($products as $product)
                    <li>
                        <div class="flex md:w-[70%] mx-auto p-2 border-2 justify-between">
                            <p>{{ $product->title }}</p>
                            <p>{{ $product->slug }}</p>
                            <p>{{ $product->price }}</p>
                            <p>{{ $product->description }}</p>
                            <img class=" w-16" src="{{ asset('img/products/' . $product->img) }}"
                                alt="{{ $product->title }}">
                        </div>

                    </li>
                @endforeach
            </ul>
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
