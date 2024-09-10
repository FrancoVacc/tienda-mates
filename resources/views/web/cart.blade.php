<x-layout.layout-web>
    <main>
        <h1 class=" text-center text-2xl text-corduraGreen my-4"> Tu Carrito de Compras</h1>
        <section class="lg:grid grid-cols-6">
            @if (isset($cart) && count($cart->items))
                {{-- mobile version --}}
                @foreach ($cart->items as $item)
                    <section class=" md:hidden w-full px-1 my-5 ">
                        <div class=" border border-gray rounded-sm flex flex-col items-center justify-center">

                            <img src="{{ asset('img/products/' . $item->img) }}" alt="{{ $item->img }}"
                                class=" w-20 rounded-sm my-2">
                            <div class=" w-full pl-3 border-t border-t-gray">
                                <p class=" font-bold">Producto</p>
                                <p>{{ $item->product_title }}</p>
                            </div>
                            <div class=" w-full pl-3 border-t border-t-gray">
                                <p class=" font-bold">Precio</p>
                                <p>${{ number_format($item->price, 2, ',', '.') }}</p>
                            </div>
                            <div class=" w-full flex pl-3 border-t border-t-gray py-2">
                                <form action="{{ route('itemupdate', $item->id) }}" method="POST"
                                    class="flex flex-col">
                                    @csrf
                                    @method('patch')
                                    <label for="cuantity" class="font-bold">Cantidad</label>
                                    <input type="number" name="cuantity" value="{{ $item->cuantity }}" class="w-10">
                                    <input type="submit" value="Actualizar"
                                        class=" bg-corduraLightGreen hover:bg-corduraGreen text-white rounded-sm w-20 mt-3">
                                </form>
                                <form action="{{ route('itemdelete', $item->id) }}" method="POST"
                                    class="flex flex-col justify-end ml-2">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="Quitar"
                                        class=" bg-lightRed hover:bg-red text-white rounded-sm w-20 mt-3">
                                </form>
                            </div>
                            <div class=" w-full pl-3 border-t border-t-gray">
                                <p class=" font-bold">Subtotal</p>
                                <p>${{ number_format($item->price * $item->cuantity, 2, ',', '.') }}</p>
                            </div>

                        </div>
                    </section>
                @endforeach

                {{-- Desktop Version --}}
                <section class="hidden md:block px-1 lg:col-span-4 mx-auto my-4 ">
                    <table class="w-full text-sm text-left  text-gray-500 border border-gray">
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
                                        <form action="{{ route('itemupdate', $item->id) }}" method="POST"
                                            class="flex">
                                            @csrf
                                            @method('patch')
                                            <input type="number" name="cuantity" value="{{ $item->cuantity }}"
                                                class="w-20">
                                            <input type="submit" value="Actualizar"
                                                class=" bg-corduraLightGreen hover:bg-corduraGreen text-white rounded-sm w-20 ml-2 mt-3">
                                        </form>
                                        <form action="{{ route('itemdelete', $item->id) }}" method="POST"
                                            class="flex flex-col justify-end ml-2">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" value="Quitar"
                                                class=" bg-lightRed hover:bg-red text-white rounded-sm w-20  mt-3">
                                        </form>
                                    </td>
                                    <td class="px-6 py-4">
                                        <p>${{ number_format($item->price, 2, ',', '.') }}</p>
                                    </td>
                                    <td class="px-6 py-4">
                                        <p>${{ number_format($item->price * $item->cuantity, 2, ',', '.') }}</p>
                                    </td>
                                    <td class="px-6 py-4">
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </section>

                <section class="w-full px-1 my-5 lg:col-span-2">
                    <div class=" border border-gray p-4">
                        <h3 class="font-bold text-xl">Total a pagar:</h3>
                        <p>${{ number_format($totalPrice, 2, ',', '.') }}</p>
                        <form action="{{ route('buycart') }}" method="POST" class="mt-2">
                            @csrf
                            <input type="submit" value="Comprar"
                                class=" py-2 px-5 w-full text-center text-white bg-corduraLightGreen hover:bg-corduraGreen">
                        </form>
                    </div>


                </section>
        </section>
    @else
        <section class=" col-span-6 w-full flex flex-col justify-center bg-gray h-28 mb-4">
            <h1 class="text-center text-white font-bold">Oh aún no hay nada por aquí</h1>
            <a href="{{ route('myorders') }}"
                class=" text-center rounded-md bg-corduraLightGreen hover:bg-corduraGreen text-white px-4 py-2 mx-auto">
                Ir a
                Compras </a>
        </section>
        @endif
    </main>
</x-layout.layout-web>
