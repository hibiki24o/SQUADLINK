<x-app-layout>
    <div class="space-y-6">

        <!-- ヘッダー -->
        <div class="flex justify-between items-center">
            <h1 class="text-xl md:text-3xl font-bold">
                募集一覧
            </h1>

            <a href="{{ route('posts.create') }}">
                <x-button>
                    投稿する
                </x-button>
            </a>
        </div>

        <!-- 検索フォーム -->
        <x-card>
            <form method="GET" action="{{ route('posts.index') }}"
                  class="grid md:grid-cols-3 gap-3">

                <select name="game_id" class="border rounded-lg p-2 text-black bg-white">
                    <option value="">すべてのゲーム</option>

                    @foreach($games as $game)
                        <option value="{{ $game->id }}"
                            {{ request('game_id') == $game->id ? 'selected' : '' }}>
                            {{ $game->name }}
                        </option>
                    @endforeach
                </select>

                <input
                    type="text"
                    name="keyword"
                    value="{{ request('keyword') }}"
                    placeholder="キーワード検索"
                    class="border rounded-lg p-2">

                <x-button type="submit">
                    検索
                </x-button>

            </form>
        </x-card>

        <!-- 投稿一覧 -->
        <div class="grid gap-4">
            @forelse($posts as $post)
                <x-card>

                    <!-- タイトル -->
                    <div class="flex justify-between items-center mb-2">
                        <a href="{{ route('posts.show', $post) }}"
                           class="text-lg md:text-xl font-semibold text-blue-600 hover:text-blue-600">
                            {{ $post->title }}
                        </a>

                        <span class="text-sm text-gray-500">
                            {{ $post->created_at->diffForHumans() }}
                        </span>
                    </div>

                    <!-- ゲーム -->
                    <p class="text-sm text-gray-900 mb-2">
                        {{ $post->game->name }}
                    </p>

                    <!-- 本文 -->
                    <p class="text-gray-700 mb-3">
                        {{ $post->body }}
                    </p>

                    <!-- 詳細 -->
                    <div class="text-sm text-gray-500 space-y-1">
                        <p>投稿者: {{ $post->user->name }}</p>
                        <p>Platform: {{ $post->platform }}</p>
                        <p>人数: {{ $post->recruit_count }}</p>
                    </div>

                </x-card>
            @empty
                <x-card>
                    <p class="text-gray-500 text-center">
                        投稿がまだありません
                    </p>
                </x-card>
            @endforelse
        </div>

    </div>
</x-app-layout>