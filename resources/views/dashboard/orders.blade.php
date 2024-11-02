<x-app-layout>
    <x-dashboard-content title="{{ 'Ordenes de Compra' }}">

        @if (count($orders))
            @session('message')
                <x-message-add :type="session('type')" :message="session('message')" />
            @endsession
            <section>
                <table class="w-full text-sm text-left rtl:text-right">
                    <thead class="text-xs text-white uppercase bg-gray">
                        <th scope="col" class="md:px-6 text-center px-2 py-3">Orden</th>
                        <th scope="col" class="md:px-6 text-center px-2 py-3 hidden md:table-cell">Estado</th>
                        <th scope="col" class="md:px-6 text-center px-2 py-3">Cliente</th>
                        <th scope="col" class="md:px-6 text-center px-2 py-3">Precio</th>
                        <th scope="col" class="md:px-6 text-center px-2 py-3">Ver Pedido</th>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr class="border-y border-zinc">
                                <td class="py-2 text-center">{{ $order->order_number }}</td>
                                <td class="py-2 text-center hidden md:table-cell">{{ $order->statusInfo->name }}</td>
                                <td class="py-2 text-center">{{ $order->user->name }}</td>
                                <td class="py-2 text-center">${{ number_format($order->price, 2, ',', '.') }}</td>
                                <td class="py-2 flex justify-center"><a href="{{ route('ordershow', $order->id) }}"
                                        class="bg-purple px-2 py-1 text-xs text-white rounded-sm"><i
                                            class="fa-solid fa-eye"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $orders->links() }}
            </section>
            <script src="{{ asset('js/alertTimeout.js') }}"></script>
        @else
            <section class=" col-span-6 w-full flex flex-col justify-center bg-gray h-28 mb-4">
                <h1 class="text-center text-white font-bold">Oh aún no hay nada por aquí</h1>
            </section>
        @endif
    </x-dashboard-content>
</x-app-layout>
