<x-layout.layout-web>
    <div class="md:flex md:justify-center md:w-[60%] md:mx-auto mt-5">
        @if (count($categories))
            @foreach ($categories as $category)
                <x-category-card :category='$category'></x-category-card>
            @endforeach
        @else
            <x-no-element message='Lamentablemente aún no hay productos disponibles a la venta'></x-no-element>
        @endif
    </div>
</x-layout.layout-web>
