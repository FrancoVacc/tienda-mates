<x-layout.layout-web>
    <main>
        <h1 class=" text-center text-2xl text-corduraGreen my-4"> Tu Carrito de Compras</h1>
        @if (isset($cart))
            @foreach ($cart->items as $item)
                {{-- mobile version --}}
                <div class=" md:hidden w-full px-1 my-5 ">
                    <div class=" border border-gray rounded-sm flex flex-col items-center justify-center">

                        <img src="{{ asset('img/products/' . $item->img) }}" alt="{{ $item->img }}"
                            class=" w-20 rounded-sm my-2">
                        <div class=" w-full pl-3 border-t border-t-gray">
                            <p class=" font-bold">Producto</p>
                            <p>{{ $item->product_title }}</p>
                        </div>
                        <div class=" w-full pl-3 border-t border-t-gray">
                            <p class=" font-bold">Precio</p>
                            <p>${{ $item->price }}</p>
                        </div>
                        <div class=" w-full flex pl-3 border-t border-t-gray py-2">
                            <form action="" class="flex flex-col">
                                <label for="cuantity" class="font-bold">Cantidad</label>
                                <input type="number" value="{{ $item->cuantity }}" class="w-10">
                                <input type="submit" value="Actualizar"
                                    class=" bg-corduraLightGreen hover:bg-corduraGreen text-white rounded-sm w-20 mt-3">
                            </form>
                            <form action="" class="flex flex-col justify-end ml-2">
                                <input type="submit" value="Quitar"
                                    class=" bg-lightRed hover:bg-red text-white rounded-sm w-20 mt-3">
                            </form>
                        </div>
                        <div class=" w-full pl-3 border-t border-t-gray">
                            <p class=" font-bold">Subtotal</p>
                            <p>${{ $item->price * $item->cuantity }}</p>
                        </div>

                    </div>
                </div>
            @endforeach


            <div class="hidden md:block  w-[80%] mx-auto my-4 border border-gray">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Producto
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Cantidad
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Precio
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Subtotal
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart->items as $item)
                            <tr class="border-b border-gray">
                                <td class="p-4 ">

                                    <img src="{{ asset('img/products/' . $item->img) }}" alt="{{ $item->img }}"
                                        class=" w-20 rounded-sm my-2">
                                    <p>{{ $item->product_title }}</p>
                                </td>
                                <td class="px-6 py-4 flex align-middle">
                                    <form action="" class="flex">
                                        <input type="number" name="cuantity" value="{{ $item->cuantity }}"
                                            class="w-20">
                                        <input type="submit" value="Actualizar"
                                            class=" bg-corduraLightGreen hover:bg-corduraGreen text-white rounded-sm w-20 ml-2 mt-3">
                                    </form>
                                    <form action="" class="flex flex-col justify-end ml-2">
                                        <input type="submit" value="Quitar"
                                            class=" bg-lightRed hover:bg-red text-white rounded-sm w-20  mt-3">
                                    </form>
                                </td>
                                <td class="px-6 py-4">
                                    <p>${{ $item->price }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    <p>${{ $item->price * $item->cuantity }}</p>
                                </td>
                                <td class="px-6 py-4">
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        @else
            <div class=" w-full flex flex-col justify-center bg-gray h-28 mb-4">
                <h1 class="text-center text-white font-bold">Oh aún no hay nada por aquí</h1>
            </div>
        @endif
    </main>
</x-layout.layout-web>
