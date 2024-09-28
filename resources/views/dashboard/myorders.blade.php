<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mis Ordenes') }}
        </h2>
    </x-slot>
    @if (count($orders))
        <section>
            <table class="w-full text-sm text-left rtl:text-right">
                <thead class="text-xs text-white uppercase bg-gray">
                    <th scope="col" class="md:px-6 text-center px-2 py-3">Orden</th>
                    <th scope="col" class="md:px-6 text-center px-2 py-3 hidden md:table-cell">Estado</th>
                    <th scope="col" class="md:px-6 text-center px-2 py-3">Seguimiento</th>
                    <th scope="col" class="md:px-6 text-center px-2 py-3">Precio</th>
                    <th scope="col" class="md:px-6 text-center px-2 py-3">Ver Pedido</th>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr class="border-y border-gray">
                            <td class="py-2  text-center ">{{ $order->order_number }}</td>
                            <td class="py-2  text-center hidden md:table-cell">{{ $order->statusInfo->name }}</td>
                            @if (isset($order->track_link))
                                <td class="py-2 text-center"><a href="{{ $order->track_link }}"
                                        class="bg-red px-2 py-1 text-xs text-white rounded-sm">Seguir</a>
                                </td>
                            @else
                                <td class="py-2 text-center">
                                    <p class="bg-red px-2 py-1 text-xs text-white rounded-sm">Pendiente</p>
                                </td>
                            @endif
                            <td class="py-2 text-center ">${{ number_format($order->price, 2, ',', '.') }}</td>
                            <td class="py-2 text-center"><a href="{{ route('myorder', $order->id) }}"
                                    class="bg-purple px-2 py-1 text-xs text-white rounded-sm">Ver</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    @else
        <section class=" col-span-6 w-full flex flex-col justify-center bg-gray h-28 mb-4">
            <h1 class="text-center text-white font-bold">Oh aún no hay nada por aquí</h1>
        </section>
    @endif
</x-app-layout>
