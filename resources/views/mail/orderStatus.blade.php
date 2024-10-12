<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <p>Hola, te contamos que estamos procesado tu compra con Número de Orden <b>{{ $order->order_number }}</b></p>
    <br>

    @switch($order->id_status)
        @case(2)
            <p>Hemos <b>Recibido tu pago</b></p>
        @break

        @case(3)
            <p><b>Tu pedido fué despachado</b></p>
            <br>
            <p>Puedes chequear el envío en el siguiente link: {{ $order->track_link }}</p>
        @break

        @case(4)
            <p><b>Tu pedido fué entregado</b> Gracias por comprar en nuestra página</p>
        @break

        @case(5)
            <p>Procesamos la <b>cancelación</b> de tu pedido</p>
            <br>
            <p>Te esperamos la próxima</p>
        @break

        @case(6)
            <p>Ya tomamos la <b>Devolución</b> de tu pedido</p>
            <br>
            <p>Te esperamos la próxima</p>
        @break

        @default
    @endswitch

</body>

</html>
