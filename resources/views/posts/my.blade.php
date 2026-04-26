<x-app-layout>
    <div class="space-y-6">

        <!-- ヘッダー -->
        <div class="flex justify-between items-center">
            <h1 class="text-xl md:text-3xl font-bold">
                マイ投稿
            </h1>

            <a href="{{ route('posts.create') }}">
                <x-button>
                    投稿する
                </x-button>
            </a>
        </div>

        <!-- 投稿一覧 -->
        <div class="grid gap-4">
            @forelse($posts as $post)
                <x-card>

                    <!-- タイトル -->
                    <div class="flex justify-between items-center mb-2">
                        <a href="{{ route('posts.show', $post) }}"
                           class="text-lg md:text-xl font-semibold hover:text-blue-600">
                            {{ $post->title }}
                        </a>

                        <span class="text-sm text-gray-500">
                            {{ $post->created_at->diffForHumans() }}
                        </span>
                    </div>

                    <!-- ゲーム -->
                    <p class="text-sm text-blue-600 mb-2">
                        {{ $post->game->name }}
                    </p>

                    <!-- 本文 -->
                    <p class="text-gray-700 mb-3">
                        {{ $post->body }}
                    </p>

                    <!-- 詳細 -->
                    <div class="text-sm text-gray-500 space-y-1">
                        <p>Platform: {{ $post->platform }}</p>
                        <p>人数: {{ $post->recruit_count }}</p>
                    </div>

                    <!-- ボタン -->
                    <div class="mt-4 flex gap-2">

                        <a href="{{ route('posts.edit', $post) }}">
                            <x-button class="!bg-yellow-500 hover:!bg-yellow-600 !text-white">
                                編集
                            </x-button>
                        </a>

                        <form method="POST" action="{{ route('posts.destroy', $post) }}">
                            @csrf
                            @method('DELETE')

                            <x-button
                                onclick="return confirm('削除しますか？')"
                                class="bg-red-500 hover:bg-red-600">
                                削除
                            </x-button>
                        </form>

                    </div>

                </x-card>
            @empty
                <x-card>
                    <p class="text-gray-500 text-center">
                        まだ投稿がありません
                    </p>
                </x-card>
            @endforelse
        </div>

    </div>
</x-app-layout>