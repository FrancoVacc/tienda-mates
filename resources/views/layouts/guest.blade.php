<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans bg-black antialiased">
    <div class="min-h-screen flex md:max-w-xl md:mx-auto flex-col justify-center items-center md:pt-6 pt-0 px-2">
        <div>
            <a href="/">
                <x-application-logo />
            </a>
        </div>

        <div class="max-w-md mt-6 px-6 py-4 bg-corduraLightGreen text-white overflow-hidden rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
