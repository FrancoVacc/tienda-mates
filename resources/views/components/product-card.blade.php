@props(['product'])

<a href="{{ route('producto', $product->id) }}">
    <div class=" md:col-span-1 md:max-w-72 m-2 hover:shadow-md hover:shadow-gray  overflow-hidden">
        <img class=" mx-auto" src="{{ $product->imgUrl() }}" alt="{{ $product->title }}">
        <div class=" bg-corduraLightGreen">
            <h2 class="font-bold text-xl p-2">{{ $product->title }}</h2>
            <p class="font-semibold text-md p-2">${{ number_format($product->price, 2, ',', '.') }} @if (!$product->available)
                    <span class=" text-lightRed "> - Sin Stock
                        -</span>
                @endif
            </p>
        </div>
    </div>
</a>
