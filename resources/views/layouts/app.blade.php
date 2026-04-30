<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SquadLink') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen font-sans antialiased text-gray-100 bg-cyber-bg bg-cyber-gradient overflow-x-hidden">

    <!-- Background Orbs / Patterns -->
    <div class="fixed inset-0 pointer-events-none z-0">
        <div class="absolute top-[-10%] left-[-10%] w-[500px] h-[500px] bg-cyber-accent opacity-10 rounded-full blur-[120px] animate-pulse-slow"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[500px] h-[500px] bg-indigo-500 opacity-10 rounded-full blur-[120px] animate-pulse-slow" style="animation-delay: 2s;"></div>
        <div class="absolute inset-0 opacity-10" style="background-image: url('https://www.transparenttextures.com/patterns/stardust.png');"></div>
    </div>

    <!-- 全体 -->
    <div class="relative min-h-screen flex flex-col z-10">

        <!-- ナビ -->
        @include('layouts.navigation')

        <!-- ヘッダー -->
        @isset($header)
            <header class="glass-panel border-b-0 border-b border-cyber-border sticky top-0 z-40">
                <div class="max-w-6xl mx-auto py-4 px-4">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- メイン -->
        <main class="flex-1 max-w-6xl mx-auto w-full py-6 sm:py-10 px-4 space-y-6 animate-fade-in-up">

            <!-- コンテンツカード風 -->
            <div class="glass-panel rounded-2xl p-4 sm:p-6 shadow-glow">
                {{ $slot }}
            </div>

        </main>

        <!-- フッター -->
        <footer class="text-center text-gray-500 text-sm py-6">
            © SquadLink - Game Squad Matching
        </footer>

    </div>

</body>
</html>