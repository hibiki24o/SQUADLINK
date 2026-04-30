<x-app-layout>
    <div>
        <h1 class="text-xl md:text-3xl lg:text-4xl font-bold text-cyber-accent text-glow mb-6">
            募集投稿作成
        </h1>

        <div class="bg-white rounded-xl p-6 shadow-lg">
            <form method="POST" action="{{ route('posts.store') }}" class="space-y-4 text-black">
                @csrf

                <!-- ゲーム -->
                <div>
                    <label class="block mb-1 font-semibold">ゲーム</label>

                    <select name="game_id" class="w-full border rounded-lg p-2 text-black bg-white">
                        <option value="">選択してください</option>

                        @foreach($games as $game)
                            <option value="{{ $game->id }}">
                                {{ $game->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- タイトル -->
                <div>
                    <label class="block mb-1 font-semibold">タイトル</label>
                    <x-input type="text" name="title" required />
                </div>

                <!-- 内容 -->
                <div>
                    <label class="block mb-1 font-semibold">内容</label>

                    <!-- テンプレート -->
                    <div class="mb-2">
                        <label class="block mb-1 font-semibold">テンプレート</label>

                        <div class="flex gap-2 flex-wrap">
                            <button type="button" onclick="setTemplate('apex')" class="border px-3 py-1 rounded-full text-sm hover:bg-gray-100">
                                Apex
                            </button>

                            <button type="button" onclick="setTemplate('casual')" class="border px-3 py-1 rounded-full text-sm hover:bg-gray-100">
                                ゆる募集
                            </button>

                            <button type="button" onclick="setTemplate('night')" class="border px-3 py-1 rounded-full text-sm hover:bg-gray-100">
                                夜メイン
                            </button>
                        </div>
                    </div>

                    <!-- テキストエリア -->
                    <textarea id="body" name="body" rows="4"
                        class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500 resize-none"
                        placeholder="募集内容を書いてください。テンプレートからも入力できます。"></textarea>
                </div>

                <!-- Platform -->
                <div>
                    <label class="block mb-1 font-semibold">Platform</label>

                    <select name="platform" class="w-full border rounded-lg p-2 text-black bg-white">
                        <option value="">選択してください</option>
                        <option value="PC">PC</option>
                        <option value="PlayStation">PlayStation</option>
                        <option value="Switch">Switch</option>
                        <option value="DS">DS</option>
                    </select>
                </div>

                <!-- フラグ -->
                <div class="flex gap-6">
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="vc_flag">
                        VCあり
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="beginner_flag">
                        初心者歓迎
                    </label>
                </div>

                <!-- プレイ時間 -->
                <div>
                    <label class="block mb-1 font-semibold">プレイ時間帯</label>
                    <x-input type="text" name="play_time" placeholder="例：平日20時～24時"/>
                    
                </div>

                <!-- 募集人数 -->
                <div>
                    <label class="block mb-1 font-semibold">募集人数</label>
                    <x-input type="number" name="recruit_count" value="1" />
                </div>

                <!-- ボタン -->
                <div class="pt-4">
                    <x-button type="submit">
                        投稿する
                    </x-button>
                </div>

            </form>
        </div>
    </div>

    <!-- テンプレJS -->
    <script>
        function setTemplate(type) {
            const textarea = document.getElementById('body');

            const templates = {
                apex: `Apex Legendsを一緒にできる方募集です。
ランクはゴールド帯です。
VCありで楽しくやれる方お願いします。`,

                casual: `気軽に遊べるフレンドを募集しています。
ゲーム・雑談どちらでもOKです。
長く遊べる人だと嬉しいです。`,

                night: `夜21時〜24時に一緒に遊べる方募集です。
エンジョイ勢なので楽しくやれる方お願いします。`
            };

            textarea.value = templates[type] || '';
        }
    </script>
</x-app-layout>