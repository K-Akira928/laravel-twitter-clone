<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-black text-white">
    <main>
        <div class="flex justify-center">
            <div class="w-[275px] border-r">
                {{ $sideNav }}
            </div>
            <div class="w-[600px]">
                {{ $mainContents }}
            </div>
            <div class="w-[350px] pl-10 border-l">
                {{ $sideContents }}
            </div>
        </div>
    </main>
</body>

</html>
