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

<body class="min-h-screen font-sans antialiased text-white bg-gradient-to-br from-gray-900 via-gray-800 to-black">

    <!-- 背景パターン -->
    <div class="fixed inset-0 opacity-10 pointer-events-none"
         style="background-image: url('https://www.transparenttextures.com/patterns/stardust.png');">
    </div>

    <!-- 全体 -->
    <div class="relative min-h-screen flex flex-col">

        <!-- ナビ -->
        @include('layouts.navigation')

        <!-- ヘッダー -->
        @isset($header)
            <header class="bg-black/40 backdrop-blur border-b border-gray-700">
                <div class="max-w-6xl mx-auto py-4 px-4">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- メイン -->
        <main class="flex-1 max-w-6xl mx-auto w-full py-6 sm:py-10 px-4 space-y-6">

            <!-- コンテンツカード風 -->
            <div class="bg-black/30 backdrop-blur rounded-xl p-4 sm:p-6 shadow-lg">
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