<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NuevaVenta</title>
</head>

<body>
    <h3>Nueva Venta Realizada</h3>
    <br>
    <p>Hola Admin, tenemos la noticia de que haz realizado una nueva venta, debes ponerte en contacto lo antes posible
        con el cliente para coordinar</p>
    <br>
    <p>El Número de pedido es: <b>{{ $order->order_number }}</b></p>
    <br>
    <p>Lo que vendiste fue:</p>
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
    <p>Total de la venta: <b>{{ $order->price }}</b></p>
    <br>
    <p>Para ver esta venta haz clic <a href="http://127.0.0.1:8000/order/{{ $order->id }}">aquí</a></p>
</body>

</html>
