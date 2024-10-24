<x-layout.layout-web>
    @session('message')
        <x-message-add :type="session('type')" :message="session('message')" />
    @endsession
    <div class=" md:w-[80%] mx-auto p-4 md:pt-10  md:flex">
        <div class=" md:w-[50%] md:mr-4">
            <img src="{{ $product->imgUrl() }}" alt="{{ $product->title }}">
        </div>
        <div class=" md:w-[50%]">
            <h1 class=" font-bold text-4xl mb-2">{{ $product->title }}</h1>

            <p class="text-xl font-bold my-4">${{ number_format($product->price, 2, ',', '.') }}</p>
            @if ($product->available)
                <form action="{{ route('addtocart') }}" method="POST"
                    class="flex flex-col md:flex-row border-y border-y-gray pb-4">
                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="title" value="{{ $product->title }}">
                    <input type="hidden" name="price" value="{{ $product->price }}">
                    <input type="hidden" name="img" value="{{ $product->img }}">
                    <div class="flex flex-col md:mr-2 my-2 ">
                        <label for="cantidad">Cantidad</label>
                        <input type="number" id="cuantity" min="1" placeholder="Ej: 1" name="cuantity"
                            class=" w-20 rounded-md">
                    </div>

                    <button
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
    <script src="{{ asset('js/alertTimeout.js') }}"></script>
</x-layout.layout-web>
