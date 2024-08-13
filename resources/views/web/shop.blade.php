<x-layout.layout-web>
    <div class=" wy-[60%] mx-auto mt-4 flex flex-wrap p-10">
        @if (count($productos))
            @foreach ($productos as $product)
                <a href="{{ route('producto', $product->id) }}">
                    <div class=" m-2 hover:shadow-md hover:shadow-gray max-w-40 rounded-md overflow-hidden">
                        <img class=" mx-auto" src="{{ asset('img/products/' . $product->img) }}"
                            alt="{{ $product->title }}">
                        <div class=" bg-corduraLightGreen">
                            <h2 class="font-bold text-xl p-2">{{ $product->title }}</h2>
                            <p class="font-semibold text-md p-2">${{ $product->price }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        @else
    </div>
    <div class=" px-5 pt-2 bg-corduraLightGreen rounded-md text-center font-bold text-white my-10 mx-auto w-[80%]">
        <p>Lamentablemente aún no hay productos disponibles a la venta</p>
    </div>
    @endif

</x-layout.layout-web>
