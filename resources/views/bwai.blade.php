<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="flex flex-col">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title inertia>{{ config('app.name', 'BWAI') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('/css/app.css', '/assets/bwai/') }}" />

        <!-- Scripts -->
        @routes
        <script src="{{mix('js/app.js', '/assets/bwai')}}" defer></script>
    </head>
    <body class="h-screen max-h-screen overflow-hidden flex flex-col font-sans antialiased bg-white dark:bg-black text-black dark:text-white">
        @inertia
    </body>
</html>
