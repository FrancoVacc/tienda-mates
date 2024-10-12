<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nuevo Mensaje</title>
</head>

<body>
    <h1 class="title">Nuevo Mensaje de {{ $messageContent->name . ' ' . $messageContent->lastname }}</h1>
    <hr>
    <p class="p">Hola tienes un nuevo mensaje:</p>
    <p class="p">{{ $messageContent->message }}</p>
    <hr>
    <a href="http://127.0.0.1:8000/message/{{ $messageContent->id }}" class="btn">Ver</a>
    <style>
        .title {
            font-family: sans-serif;
            font-size: 1.5rem;
            font-style: normal;
            text-align: center;
            margin-bottom: 2rem;
        }

        .p {
            margin-top: 2rem;
            font-family: sans-serif;
            font-size: 1rem;
            font-style: normal;
        }

        .btn {
            background-color: #008CBA;
            border: none;
            border-radius: 4px;
            color: white;
            padding: 12px 28px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            display: block;
            width: 30px
        }
    </style>
</body>

</html>
