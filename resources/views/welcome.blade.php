<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SquadLink | ゲーム仲間募集掲示板</title>
    @vite(['resources/css/app.css'])
</head>

<body class="bg-gray-900 text-white">

<!-- HERO -->
<section class="min-h-screen flex flex-col justify-center items-center text-center px-6">

    <div class="text-6xl mb-4">🎮</div>

    <h1 class="text-4xl md:text-6xl font-bold">
        SquadLink
    </h1>

    <p class="mt-4 text-gray-300 text-lg md:text-xl">
        ゲーム仲間がすぐ見つかる、<br>
        新しい“フレンド募集掲示板”
    </p>

    <div class="mt-8 flex gap-4">
        <a href="/posts"
           class="px-6 py-3 bg-blue-500 hover:bg-blue-600 rounded-lg font-bold">
            募集を見る
        </a>

        <a href="/login"
           class="px-6 py-3 bg-gray-700 hover:bg-gray-600 rounded-lg font-bold">
            ログイン
        </a>
    </div>

</section>

<!-- FEATURES -->
<section class="py-20 px-6 max-w-5xl mx-auto">

    <h2 class="text-3xl font-bold text-center mb-12">
        🎯 できること
    </h2>

    <div class="grid md:grid-cols-3 gap-8">

        <div class="bg-gray-800 p-6 rounded-lg">
            <div class="text-3xl mb-2">🔥</div>
            <h3 class="font-bold text-xl mb-2">仲間募集</h3>
            <p class="text-gray-300 text-sm">
                ゲームごとにプレイヤーを募集して即マッチング
            </p>
        </div>

        <div class="bg-gray-800 p-6 rounded-lg">
            <div class="text-3xl mb-2">🎧</div>
            <h3 class="font-bold text-xl mb-2">VCあり/なし</h3>
            <p class="text-gray-300 text-sm">
                ボイスチャットの有無で条件検索できる
            </p>
        </div>

        <div class="bg-gray-800 p-6 rounded-lg">
            <div class="text-3xl mb-2">⚡</div>
            <h3 class="font-bold text-xl mb-2">即参加</h3>
            <p class="text-gray-300 text-sm">
                思い立ったらすぐパーティー参加
            </p>
        </div>

    </div>

</section>

<!-- GAMES -->
<section class="py-20 bg-gray-800 px-6 overflow-hidden">

    <h2 class="text-3xl font-bold text-center mb-12">
        🎮 主な対応ゲーム
    </h2>

    <!-- 外枠（アニメーション用） -->
    <div class="relative">

        <div class="flex gap-4 w-max animate-scroll">

            <!-- 1周目 -->
            <div class="game-card">Apex Legends</div>
            <div class="game-card">Valorant</div>
            <div class="game-card">Fortnite</div>
            <div class="game-card">FF14</div>
            <div class="game-card">Minecraft</div>
            <div class="game-card">Call of Duty</div>
            <div class="game-card">Overwatch 2</div>
            <div class="game-card">League of Legends</div>
            <div class="game-card">Rocket League</div>
            <div class="game-card">Dead by Daylight</div>
            <div class="game-card">Splatoon 3</div>
            <div class="game-card">Genshin Impact</div>

            <!-- 2周目（無限ループ感） -->
            <div class="game-card">Apex Legends</div>
            <div class="game-card">Valorant</div>
            <div class="game-card">Fortnite</div>
            <div class="game-card">FF14</div>
            <div class="game-card">Minecraft</div>

        </div>

    </div>

</section>

<!-- スタイル -->
<style>
.game-card {
    min-width: 180px;
    padding: 12px 16px;
    background: #374151;
    border-radius: 12px;
    text-align: center;
    color: white;
    transition: all 0.2s ease;
    cursor: pointer;
}

/* hoverで拡大 */
.game-card:hover {
    transform: scale(1.08);
    background: #4b5563;
}

/* 横スクロールアニメーション */
@keyframes scroll {
    0% {
        transform: translateX(0);
    }
    100% {
        transform: translateX(-50%);
    }
}

/* 動き */
.animate-scroll {
    animation: scroll 25s linear infinite;
}

/* ホバー時は停止（重要UX） */
.animate-scroll:hover {
    animation-play-state: paused;
}
</style>

<!-- CTA -->
<section class="py-24 text-center">

    <h2 class="text-3xl font-bold mb-6">
        今すぐスクワッドを組もう
    </h2>

    <a href="/posts"
       class="px-8 py-4 bg-blue-500 hover:bg-blue-600 rounded-lg font-bold text-lg">
        募集一覧へ
    </a>

</section>

<!-- FOOTER -->
<footer class="py-10 text-center text-gray-500 text-sm">
    © SquadLink
</footer>

</body>
</html>