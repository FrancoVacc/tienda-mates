<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gracias por tu compra</title>
</head>

<body>
    <p>Hola {{ $user->name }}, hemos recibido el pedido de tu compra, te rogamos que sigas los pasos correspondientes
        y aguardes a que nos comuniquemos</p>
    <br>
    <p>Tu Número de pedido es: <b>{{ $order->order_number }}</b></p>
    <br>
    <p>Lo que compraste fue:</p>
    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
            </tr>
        </thead>
        <hr>
        <tbody>
            @foreach (json_decode($order->items) as $item)
                <tr>
                    <td>{{ $item->product_title }}</td>
                    <td>{{ $item->price }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
    <p>Total a pagar: <b>{{ $order->price }}</b></p>
    <br>
    <p>Podes ver este y otros pedidos <a href="http://127.0.0.1:8000/order/my_orders">aquí</a></p>
</body>

</html>
