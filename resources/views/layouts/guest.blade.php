<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'أمل') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@100;200;300;400;500;600;700&family=Scheherazade+New:wght@400;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-sky-100 flex flex-col min-h-screen font-arabic">
            <main class="flex flex-grow flex-col sm:justify-center mt-24 md:mt-16 lg:mt-0 items-center pt-6">
                <div class="w-full sm:max-w-md px-6 py-4 shadow-xl bg-blue-300 overflow-hidden sm:rounded-lg mt-10">
                    {{ $slot }}
                </div>
            </main>
    </body>
</html>
