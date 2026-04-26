<x-app-layout>
    <div class="space-y-6">

        <!-- 投稿詳細 -->
        <x-card>
            <div class="flex justify-between items-center mb-2">
                <h1 class="text-xl md:text-2xl text-gray-900 font-bold">
                    {{ $post->title }}
                </h1>

                <span class="text-sm text-gray-500">
                    {{ $post->created_at->diffForHumans() }}
                </span>
            </div>

            <!-- ゲーム -->
            <p class="text-blue-600 mb-2">
                {{ $post->game->name }}
            </p>

            <!-- 本文 -->
            <p class="mb-4 text-gray-700">
                {{ $post->body }}
            </p>

            <!-- 詳細 -->
            <div class="text-sm text-gray-500 space-y-1">
                <p>投稿者: {{ $post->user->name }}</p>
                <p>Platform: {{ $post->platform }}</p>
                <p>人数: {{ $post->recruit_count }}</p>

                @if($post->play_time)
                    <p>プレイ時間: {{ $post->play_time }}</p>
                @endif
            </div>

            <!-- フラグ -->
            <div class="mt-3 flex gap-2 text-xs">
                @if($post->vc_flag)
                    <span class="bg-green-100 text-green-700 px-2 py-1 rounded">
                        VCあり
                    </span>
                @endif

                @if($post->beginner_flag)
                    <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded">
                        初心者歓迎
                    </span>
                @endif
            </div>

            <!-- 編集・削除 -->
            @auth
                @if(auth()->id() === $post->user_id)
                    <div class="mt-4 flex gap-2">

                        <a href="{{ route('posts.edit', $post) }}">
                            <x-button>
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
                @endif
            @endauth
        </x-card>

        <!-- コメント -->
        <x-card>
            <h2 class="text-lg font-bold mb-4">コメント</h2>

            @auth
                <form method="POST" action="{{ route('comments.store', $post) }}" class="space-y-3">
                    @csrf

                    <textarea name="body" rows="3"
                        class="w-full border rounded-lg p-2 focus:ring-2 text-black focus:ring-blue-500"
                        placeholder="参加したいです！"></textarea>

                    <x-button type="submit">
                        コメントする
                    </x-button>
                </form>
            @endauth

            <!-- コメント一覧 -->
            <div class="mt-6 space-y-4">
                @forelse($post->comments as $comment)
                    <div class="border-t pt-3">
                        <p class="text-gray-800">{{ $comment->body }}</p>
                        <p class="text-sm text-gray-500">
                            {{ $comment->user->name }}
                        </p>
                    </div>
                @empty
                    <p class="text-gray-500">まだコメントはありません</p>
                @endforelse
            </div>
        </x-card>

        <!-- 戻る -->
        <div>
            <a href="{{ route('posts.index') }}">
                <x-button class="bg-gray-500 hover:bg-gray-600">
                    一覧に戻る
                </x-button>
            </a>
        </div>

    </div>
</x-app-layout>