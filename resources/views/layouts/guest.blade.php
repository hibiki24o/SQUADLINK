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
    <body class="font-sans antialiased text-gray-100 bg-cyber-bg">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-cyber-gradient relative overflow-hidden">
            <!-- Background Orbs -->
            <div class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-cyber-accent opacity-20 rounded-full blur-[100px] animate-pulse-slow pointer-events-none"></div>
            <div class="absolute bottom-[-10%] right-[-10%] w-96 h-96 bg-indigo-500 opacity-20 rounded-full blur-[100px] animate-pulse-slow pointer-events-none" style="animation-delay: 2s;"></div>

            <div class="z-10 animate-fade-in-up">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-cyber-accent drop-shadow-[0_0_10px_rgba(56,189,248,0.8)] hover:scale-110 transition-transform duration-300" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-8 py-8 glass-panel shadow-glow z-10 sm:rounded-2xl animate-fade-in-up" style="animation-delay: 0.1s;">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
