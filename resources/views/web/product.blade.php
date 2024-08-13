<x-layout.layout-web>
    <div class=" md:w-[60%] mx-auto p-4 md:p-10">
        <h1 class=" font-bold text-2xl p-2 mb-2">{{ $product->title }}</h1>
        <div class=" md:w-[40%] overflow-hidden rounded-md ">
            <img src="{{ asset('img/products/' . $product->img) }}" alt="{{ $product->title }}">
            <div>
                <p class="text-xl font-bold">${{ $product->price }}</p>
            </div>
        </div>
        <div class="py-4 mt-5">
            <h2 class=" text-xl font-bold">Descripción del producto</h2>
            <p>{{ $product->description }}</p>
        </div>
        <button class=" bg-corduraGreen hover:bg-corduraLightGreen px-2 py-4 text-white rounded-md">Agregar al
            carrito</button>

    </div>
</x-layout.layout-web>
