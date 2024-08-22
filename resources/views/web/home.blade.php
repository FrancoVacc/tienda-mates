<x-layout.layout-web>
    <div class="md:flex md:justify-center md:w-[60%] md:mx-auto mt-5">
        @if (count($categories))
            @foreach ($categories as $category)
                <div class="p-1 md:w-[30%] ">
                    <div class="rounded-xl hover:shadow-xl overflow-hidden ">
                        <a href="{{ route('category', $category->id) }}">
                            <img src="{{ $category->img }}" alt="mate">
                            <div class=" text-center text-white font-bold bg-corduraLightGreen hover:bg-corduraGreen">
                                <h2>{{ $category->categorie }}</h2>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        @else
            <div
                class=" px-5 pt-2 bg-corduraLightGreen rounded-md text-center font-bold text-white my-10 mx-auto w-[80%]">
                <p>Lamentablemente aún no hay productos disponibles a la venta</p>
            </div>

        @endif
    </div>
</x-layout.layout-web>
