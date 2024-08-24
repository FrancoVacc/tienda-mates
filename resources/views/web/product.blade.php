<x-layout.layout-web>
    <div class=" md:w-[80%] mx-auto p-4 md:pt-10  md:flex">
        <div class=" md:w-[50%] md:mr-4">
            <img src="{{ asset('img/products/' . $product->img) }}" alt="{{ $product->title }}">
        </div>
        <div class=" md:w-[50%]">
            <h1 class=" font-bold text-4xl mb-2">{{ $product->title }}</h1>

            <p class="text-xl font-bold my-4">${{ $product->price }}</p>
            @if ($product->available)
                <form action="" method="POST" class="flex flex-col md:flex-row border-y border-y-gray pb-4">
                    @csrf
                    <input type="hidden" id="title" name="id" value="{{ $product->id }}">
                    <div class="flex flex-col md:mr-2 my-2 ">
                        <label for="cantidad">Cantidad</label>
                        <input type="number" id="cuantity" min="1" placeholder="Ej: 1" name="cuantity"
                            class=" w-20 rounded-md">
                    </div>

                    <button onClick="fillCart()"
                        class=" mt-2 h-16 bg-corduraGreen hover:bg-corduraLightGreen px-2 py-4 text-white rounded-md">Agregar
                        al
                        carrito</button>

                </form>
            @else
                <div class=" py-5 px-2 rounded-md bg-corduraLightGreen text-white flex align-middle justify-center">
                    <p> Sin Stock Disponible </p>
                </div>
            @endif
            <div class="py-4 mt-5">
                <h2 class=" text-xl font-bold">Descripción del producto</h2>
                <p>{{ $product->description }}</p>
            </div>
        </div>

    </div>
</x-layout.layout-web>
