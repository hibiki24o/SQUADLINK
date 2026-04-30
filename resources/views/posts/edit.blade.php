<x-app-layout>
    <div>

        <!-- タイトル -->
        <h1 class="text-xl md:text-3xl text-cyber-accent text-glow font-bold mb-6">
            募集投稿編集
        </h1>

        <div class="bg-white rounded-xl p-6 shadow-lg">
            <form method="POST" action="{{ route('posts.update', $post) }}" class="space-y-4 text-black">
                @csrf
                @method('PUT')

                <!-- ゲーム -->
                <div>
                    <label class="block mb-1 font-semibold">ゲーム</label>

                    <select name="game_id"
                        class="w-full border rounded-lg p-2 text-black bg-white">
                        @foreach($games as $game)
                            <option value="{{ $game->id }}"
                                {{ old('game_id', $post->game_id) == $game->id ? 'selected' : '' }}>
                                {{ $game->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- タイトル -->
                <div>
                    <label class="block mb-1 font-semibold">タイトル</label>
                    <x-input
                        type="text"
                        name="title"
                        value="{{ old('title', $post->title) }}"
                        class="w-full text-black bg-white"
                        required
                    />
                </div>

                <!-- 内容 -->
                <div>
                    <label class="block mb-1 font-semibold">内容</label>

                    <textarea name="body" rows="4"
                        class="w-full border rounded-lg p-2 text-black bg-white focus:ring-2 focus:ring-blue-500">
{{ old('body', $post->body) }}
                    </textarea>
                </div>

                <!-- Platform -->
                <div>
                    <label class="block mb-1 font-semibold">Platform</label>

                    <x-input
                        type="text"
                        name="platform"
                        value="{{ old('platform', $post->platform) }}"
                        class="w-full text-black bg-white"
                    />
                </div>

                <!-- フラグ -->
                <div class="flex gap-6 text-black">
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="vc_flag"
                            {{ old('vc_flag', $post->vc_flag) ? 'checked' : '' }}>
                        VCあり
                    </label>

                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="beginner_flag"
                            {{ old('beginner_flag', $post->beginner_flag) ? 'checked' : '' }}>
                        初心者歓迎
                    </label>
                </div>

                <!-- プレイ時間 -->
                <div>
                    <label class="block mb-1 font-semibold">プレイ時間</label>

                    <x-input
                        type="text"
                        name="play_time"
                        value="{{ old('play_time', $post->play_time) }}"
                        class="w-full text-black bg-white"
                    />
                </div>

                <!-- 募集人数 -->
                <div>
                    <label class="block mb-1 font-semibold">募集人数</label>

                    <x-input
                        type="number"
                        name="recruit_count"
                        value="{{ old('recruit_count', $post->recruit_count) }}"
                        class="w-full text-black bg-white"
                    />
                </div>

                <!-- ボタン -->
                <div class="pt-4 flex gap-2">
                    <x-button type="submit">
                        更新する
                    </x-button>

                    <a href="{{ route('posts.show', $post) }}">
                        <x-button type="button" class="bg-gray-500 hover:bg-gray-600">
                            戻る
                        </x-button>
                    </a>
                </div>

            </form>
        </div>

    </div>
</x-app-layout>