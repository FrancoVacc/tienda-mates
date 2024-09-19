<x-layout.layout-web>
    <div class="md:grid md:grid-cols-6">
        <aside class="mt-4 text-2xl col-span-1">
            <aside class="mt-4 text-2xl col-span-1 ">
                @if (count($categories))


                    <div class="p-4 border-y border-gray ml-4">

                        @foreach ($categories as $category)
                            <a class="hover:text-corduraGreen text-center block"
                                href="{{ route('category', $category->id) }}">{{ $category->categorie }}</a>
                        @endforeach
                    </div>

                @endif


            </aside>
        </aside>
        <div class=" col-span-5 md:w-[70%] mx-auto mt-4 flex flex-wrap md:grid md:grid-cols-4 p-10 md:px-0">
            @if (count($productos))
                @foreach ($productos as $product)
                    <a href="{{ route('producto', $product->id) }}">
                        <div class=" md:col-span-1 md:max-w-72 m-2 hover:shadow-md hover:shadow-gray  overflow-hidden">
                            <img class=" mx-auto" src="{{ asset('img/products/' . $product->img) }}"
                                alt="{{ $product->title }}">
                            <div class=" bg-corduraLightGreen">
                                <h2 class="font-bold text-xl p-2">{{ $product->title }}</h2>
                                <p class="font-semibold text-md p-2">${{ $product->price }} @if (!$product->available)
                                        <span class=" text-lightRed "> - Sin Stock
                                            -</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </a>
                @endforeach
            @else
        </div>
        <div
            class=" col-span-3 col-start-2 px-5 pt-2 bg-corduraLightGreen rounded-md text-center font-bold text-white my-10 mx-auto w-[80%]">
            <p>Lamentablemente aún no hay productos disponibles a la venta</p>
        </div>
        @endif

    </div>

</x-layout.layout-web>
