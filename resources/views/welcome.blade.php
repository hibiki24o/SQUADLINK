<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SquadLink | ゲーム仲間募集掲示板</title>
    @vite(['resources/css/app.css'])
</head>

<body class="bg-cyber-bg bg-cyber-gradient text-white relative overflow-x-hidden font-sans cursor-crosshair">
    <!-- Dynamic FPS Background & HUD Overlay -->
    <div class="fixed inset-0 pointer-events-none z-0 overflow-hidden bg-black">
        <!-- 動くゲーミング背景画像 (Unsplash フリー素材) -->
        <div class="absolute inset-0 bg-cover bg-center opacity-30 animate-ken-burns" style="background-image: url('https://images.unsplash.com/photo-1542751371-adc38448a05e?q=80&w=2070&auto=format&fit=crop');"></div>

        <!-- 画面の縁を暗くするビネット効果 -->
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_transparent_0%,_rgba(0,0,0,0.9)_100%)] z-10"></div>

        <!-- スキャンライン (CRTモニター風) -->
        <div class="absolute inset-0 opacity-10 z-20 pointer-events-none bg-[linear-gradient(rgba(255,255,255,0),rgba(255,255,255,0)_50%,rgba(0,0,0,0.3)_50%,rgba(0,0,0,0.3))] bg-[length:100%_4px]"></div>

        <!-- FPS レーダー (右上) -->
        <div class="absolute top-8 right-8 w-32 h-32 border-2 border-cyber-accent/40 rounded-full bg-cyber-accent/5 z-30 overflow-hidden hidden md:block">
            <!-- レーダーの目盛り -->
            <div class="absolute inset-0 rounded-full border border-cyber-accent/20 m-4"></div>
            <div class="absolute inset-0 rounded-full border border-cyber-accent/20 m-8"></div>
            <!-- 十字 -->
            <div class="absolute top-0 bottom-0 left-1/2 w-px bg-cyber-accent/20 transform -translate-x-1/2"></div>
            <div class="absolute left-0 right-0 top-1/2 h-px bg-cyber-accent/20 transform -translate-y-1/2"></div>
            <!-- スキャンバー -->
            <div class="absolute top-1/2 left-1/2 w-1/2 h-full bg-gradient-to-t from-transparent to-cyber-accent/40 transform origin-left -translate-y-1/2 animate-radar-spin"></div>
            <!-- 敵の点 -->
            <div class="absolute top-10 right-10 w-2 h-2 bg-red-500 rounded-full shadow-[0_0_8px_red] animate-pulse"></div>
            <div class="absolute bottom-8 left-12 w-1.5 h-1.5 bg-red-500 rounded-full shadow-[0_0_8px_red] animate-pulse" style="animation-delay: 1s;"></div>
        </div>

        <!-- 中央の照準 (クロスヘア) 背景用 -->
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-30 opacity-20 pointer-events-none hidden md:block">
            <div class="w-96 h-96 border border-cyber-accent/30 rounded-full relative animate-spin-slow-reverse">
                <!-- 照準の目盛り -->
                <div class="absolute top-0 left-1/2 w-px h-8 bg-cyber-accent transform -translate-x-1/2"></div>
                <div class="absolute bottom-0 left-1/2 w-px h-8 bg-cyber-accent transform -translate-x-1/2"></div>
                <div class="absolute left-0 top-1/2 h-px w-8 bg-cyber-accent transform -translate-y-1/2"></div>
                <div class="absolute right-0 top-1/2 h-px w-8 bg-cyber-accent transform -translate-y-1/2"></div>
            </div>
        </div>
    </div>

<!-- HERO -->
<section class="min-h-screen flex flex-col justify-center items-center text-center px-6 relative z-10 animate-fade-in-up">

    <div class="text-6xl mb-6 drop-shadow-[0_0_15px_rgba(56,189,248,0.8)] animate-float">🎮</div>

    <h1 class="text-5xl md:text-7xl font-bold text-white text-glow tracking-tight relative">
        <span class="animate-glitch block" data-text="SquadLink">SquadLink</span>
    </h1>

    <p class="mt-6 text-gray-300 text-lg md:text-2xl font-light">
        ゲーム仲間がすぐ見つかる、<br>
        次世代の“フレンド募集プラットフォーム”
    </p>

    <div class="mt-10 flex gap-6">
        <a href="/posts"
           class="px-8 py-4 bg-cyber-accent text-black rounded-lg font-bold shadow-glow hover:shadow-glow-lg hover:-translate-y-1 transition-all duration-300">
            募集を見る
        </a>

        <a href="/login"
           class="px-8 py-4 glass-panel text-white hover:bg-white/10 rounded-lg font-bold hover:shadow-glow hover:-translate-y-1 transition-all duration-300">
            ログイン
        </a>
    </div>

</section>

<!-- FEATURES -->
<section class="py-20 px-6 max-w-5xl mx-auto relative z-10">

    <h2 class="text-3xl font-bold text-center mb-16 text-glow">
        🎯 圧倒的体験
    </h2>

    <div class="grid md:grid-cols-3 gap-8">

        <div class="glass-panel p-8 rounded-2xl hover:shadow-glow hover:-translate-y-2 transition-all duration-300 group">
            <div class="text-4xl mb-4 group-hover:scale-110 transition-transform">🔥</div>
            <h3 class="font-bold text-xl mb-3 text-cyber-accent">最速マッチング</h3>
            <p class="text-gray-300 text-sm leading-relaxed">
                ゲームごとにプレイヤーを募集して、待ち時間なく即合流。
            </p>
        </div>

        <div class="glass-panel p-8 rounded-2xl hover:shadow-glow hover:-translate-y-2 transition-all duration-300 group">
            <div class="text-4xl mb-4 group-hover:scale-110 transition-transform">🎧</div>
            <h3 class="font-bold text-xl mb-3 text-cyber-accent">VC柔軟対応</h3>
            <p class="text-gray-300 text-sm leading-relaxed">
                ボイスチャットの有無やプレイスタイルで細かく条件検索。
            </p>
        </div>

        <div class="glass-panel p-8 rounded-2xl hover:shadow-glow hover:-translate-y-2 transition-all duration-300 group">
            <div class="text-4xl mb-4 group-hover:scale-110 transition-transform">⚡</div>
            <h3 class="font-bold text-xl mb-3 text-cyber-accent">シームレス参加</h3>
            <p class="text-gray-300 text-sm leading-relaxed">
                思い立ったらすぐパーティーへ。面倒な手続きは一切不要。
            </p>
        </div>

    </div>

</section>

<!-- GAMES -->
<section class="py-24 glass-panel border-x-0 relative z-10 overflow-hidden">

    <h2 class="text-3xl font-bold text-center mb-16 text-glow">
        🎮 主な対応タイトル
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
    min-width: 200px;
    padding: 16px 20px;
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 16px;
    text-align: center;
    font-weight: bold;
    color: white;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    cursor: pointer;
    box-shadow: 0 4px 15px rgba(0,0,0,0.3);
}

/* hoverでネオンエフェクト */
.game-card:hover {
    transform: scale(1.1) translateY(-5px);
    background: rgba(255, 255, 255, 0.1);
    border-color: #38bdf8;
    box-shadow: 0 0 20px rgba(56, 189, 248, 0.6);
    color: #38bdf8;
}

/* 横スクロールアニメーション */
@keyframes scroll {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}

.animate-scroll {
    animation: scroll 25s linear infinite;
}

.animate-scroll:hover {
    animation-play-state: paused;
}

/* ケンバーンズ効果 (背景画像のゆっくりしたズーム・パン) */
@keyframes ken-burns {
    0% { transform: scale(1) translate(0, 0); }
    50% { transform: scale(1.1) translate(-1%, -1%); }
    100% { transform: scale(1) translate(0, 0); }
}
.animate-ken-burns {
    animation: ken-burns 30s ease-in-out infinite;
}

/* レーダーの回転 */
@keyframes radar-spin {
    from { transform: translateY(-50%) rotate(0deg); }
    to { transform: translateY(-50%) rotate(360deg); }
}
.animate-radar-spin {
    animation: radar-spin 4s linear infinite;
}

/* 逆回転 */
@keyframes spin-slow-reverse {
    from { transform: rotate(360deg); }
    to { transform: rotate(0deg); }
}
.animate-spin-slow-reverse {
    animation: spin-slow-reverse 20s linear infinite;
}

/* テキストグリッチ効果 */
@keyframes glitch {
    0% { transform: translate(0) }
    20% { transform: translate(-2px, 2px) }
    40% { transform: translate(-2px, -2px) }
    60% { transform: translate(2px, 2px) }
    80% { transform: translate(2px, -2px) }
    100% { transform: translate(0) }
}
.animate-glitch {
    position: relative;
    animation: glitch 3s infinite;
}
.animate-glitch::before, .animate-glitch::after {
    content: attr(data-text);
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: transparent;
}
.animate-glitch::before {
    left: 2px;
    text-shadow: -2px 0 red;
    animation: glitch 2.5s infinite linear alternate-reverse;
}
.animate-glitch::after {
    left: -2px;
    text-shadow: 2px 0 blue;
    animation: glitch 3.5s infinite linear alternate-reverse;
}
</style>

<!-- CTA -->
<section class="py-32 text-center relative z-10">

    <h2 class="text-4xl font-bold mb-8 text-glow">
        今すぐスクワッドを組もう
    </h2>

    <a href="/posts"
       class="inline-block px-10 py-5 bg-cyber-accent text-black rounded-xl font-bold text-xl shadow-glow hover:shadow-glow-lg hover:-translate-y-1 transition-all duration-300">
        募集一覧へアクセス
    </a>

</section>

<!-- FOOTER -->
<footer class="py-10 text-center text-gray-500 text-sm">
    © SquadLink
</footer>

</body>
</html>