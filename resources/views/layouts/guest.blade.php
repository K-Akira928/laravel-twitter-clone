<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-screen grid place-items-center place-content-center  bg-gray-800 bg-opacity-95 text-white">
    <main>
        <div class="w-screen md:w-[600px] md:h-[650px] bg-black rounded-xl">
            <div class="p-4">
                {{ $slot }}
            </div>
        </div>
    </main>
</body>

</html>
