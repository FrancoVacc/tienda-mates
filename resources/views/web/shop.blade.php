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
        @if (count($productos))
            <div class=" col-span-5 md:w-[70%] mx-auto mt-4 flex flex-wrap md:grid md:grid-cols-4 p-10 md:px-0">
                @foreach ($productos as $product)
                    <x-product-card :product='$product'></x-product-card>
                @endforeach
            </div>
        @else
            <x-no-element message='Lamentablemente aún no hay productos disponibles a la venta'></x-no-element>
        @endif

    </div>

</x-layout.layout-web>
