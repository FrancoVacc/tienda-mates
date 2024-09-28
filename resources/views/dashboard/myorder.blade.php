<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mis Ordenes') }}
        </h2>
    </x-slot>
    <section class="flex flex-col">

        <div class=" w-full py-4 ml-2">
            <p class=" font-bold">Número de Orden</p>
            <p>{{ $order->order_number }}</p>
        </div>
        <div class="lg:grid grid-cols-6">

            {{-- mobile version --}}
            <section class=" md:hidden w-full px-1 my-5 ">
                @foreach (json_decode($order->items) as $item)
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
                        <div class=" w-full pl-3 border-t border-t-gray">
                            <p class=" font-bold">Cantidad</p>
                            <p>{{ $item->cuantity }}</p>
                        </div>
                        <div class=" w-full pl-3 border-t border-t-gray">
                            <p class=" font-bold">Subtotal</p>
                            <p>${{ number_format($item->price * $item->cuantity, 2, ',', '.') }}</p>
                        </div>

                    </div>
                @endforeach
            </section>

            {{-- Desktop Version --}}
            <section class="hidden md:block lg:col-span-4 px-2 my-4 ">
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
                        @foreach (json_decode($order->items) as $item)
                            <tr class="border-b border-gray">
                                <td class="p-4 ">

                                    <img src="{{ asset('img/products/' . $item->img) }}" alt="{{ $item->img }}"
                                        class=" w-20 rounded-sm my-2">
                                    <p>{{ $item->product_title }}</p>
                                </td>
                                <td class="px-6 py-4 ">
                                    <p>{{ $item->cuantity }}</p>
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
                    <h3 class="font-bold text-xl">Total a pagado:</h3>
                    <p>${{ number_format($order->price, 2, ',', '.') }}</p>
                </div>
                <div class=" border border-gray p-4">
                    <h3 class="font-bold text-xl">Fecha de entrega:</h3>
                    <p>{{ date('d-m-Y', strtotime($order->delivery_date)) }}</p>
                </div>
                <div class=" border border-gray p-4">
                    <h3 class="font-bold text-xl">Estado:</h3>
                    <p>{{ $order->statusInfo->name }}</p>
                </div>
                <div class=" border border-gray p-4">
                    <h3 class="font-bold text-xl">Forma de Envío:</h3>
                    <p>{{ $order->deliveryInfo->name }}</p>
                </div>

                @if (isset($order->track_link))
                    <div class=" border border-gray p-4">
                        <h3 class="font-bold text-xl">Link de seguimiento:</h3>
                        <a href="{{ $order->track_link }}"
                            class="bg-red px-2 py-1 text-xs text-white rounded-sm">Seguir</a>
                    </div>
                @else
                    <div class=" border border-gray p-4">
                        <h3 class="font-bold text-xl">Link de seguimiento:</h3>
                        <p class="bg-red px-2 py-1 text-xs text-white rounded-sm">Pendiente</p>
                    </div>
                @endif



            </section>
        </div>
    </section>
</x-app-layout>
