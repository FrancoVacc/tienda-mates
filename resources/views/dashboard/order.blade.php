<x-app-layout>
    <x-dashboard-content title="{{ 'Ordenes de Compra' }}">
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
                            <img src="{{ $item->img }}" alt="{{ $item->product_title }}" class=" w-20 rounded-sm my-2">
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

                                        <img src="{{ $item->img }}" alt="{{ $item->product_title }}"
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
                <div class="w-full px-1 my-5 lg:col-span-2">
                    <section class="w-full px-1 my-5">
                        <h2 class="text-center font-bold text-xl">Información del Pedido</h2>
                        <div class=" border border-gray p-4">
                            <h3 class="font-bold text-xl">Total a pagado:</h3>
                            <p>${{ number_format($order->price, 2, ',', '.') }}</p>
                        </div>
                        <div class=" border border-gray p-4">
                            <h3 class="font-bold text-xl">Fecha de entrega:</h3>
                            <p>{{ date('d-m-Y', strtotime($order->delivery_date)) }}</p>
                        </div>
                        <form action="{{ route('ordershow', $order->id) }}" method="POST">
                            @csrf
                            @method('patch')
                            <div class=" border border-gray p-4">
                                <h3 class="font-bold text-xl">Estado:</h3>
                                <select name="status" id="">
                                    @foreach ($status as $item)
                                        @if ($order->id_status == $item->id)
                                            <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                        @else
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class=" border border-gray p-4">
                                <h3 class="font-bold text-xl">Forma de Envío:</h3>
                                <select name="delivery" id="">
                                    @foreach ($delivery as $item)
                                        @if ($order->id_delivery == $item->id)
                                            <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                        @else
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endif
                                    @endforeach

                                </select>
                            </div>
                            <div class=" border border-gray p-4">
                                <h3 class="font-bold text-xl">Link de seguimiento:</h3>
                                <input type="text" name="track_link" value="{{ $order->track_link }}">
                            </div>
                            <div class=" border border-gray p-4">
                                <button class=" bg-red hover:bg-lightRed text-white px-5 py-2"> Actualizar</button>
                            </div>

                        </form>
                    </section>
                    <section class="w-full px-1 my-5">
                        <h2 class="text-center font-bold text-xl">Información del Cliente</h2>
                        <div class=" border border-gray p-4">
                            <h3 class="font-bold">Nombre y Apellido:</h3>
                            <p>{{ $order->user->name . ' ' . $user_info->lastname }}</p>
                        </div>
                        <div class=" border border-gray p-4">
                            <h3 class="font-bold">D.N.I:</h3>
                            <p>{{ $user_info->dni }}</p>
                        </div>
                        <div class=" border border-gray p-4">
                            <h3 class="font-bold">Teléfono:</h3>
                            <p>{{ $user_info->phone }}</p>
                        </div>
                        <div class=" border border-gray p-4">
                            <h3 class="font-bold">Email:</h3>
                            <p>{{ $order->user->email }}</p>
                        </div>
                        <div class=" border border-gray p-4">
                            <h3 class="font-bold">Dirección:</h3>
                            <p>{{ $address->street . ' ' . $address->number . ' | ' . $address->city . ' | ' . $address->province . ' - ' . $address->country }}
                            </p>
                        </div>
                        <div class=" border border-gray p-4">
                            <h3 class="font-bold">Código Postal:</h3>
                            <p>{{ $address->postcode }}
                            </p>
                        </div>
                        <div class=" border border-gray p-4">
                            <h3 class="font-bold">Descripción:</h3>
                            <p>{{ $address->description }}
                            </p>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </x-dashboard-content>

</x-app-layout>
