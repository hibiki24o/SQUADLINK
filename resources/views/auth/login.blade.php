<x-guest-layout>

    <!-- タイトル（追加） -->
    <div class="mb-6 text-center">
        <h1 class="text-2xl font-bold text-gray-800">
            SQUADLINKへログイン
        </h1>
        <p class="text-sm text-gray-500 mt-1">
            アカウントにサインインしてください
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div>
            <x-input-label for="email" value="メールアドレス" />
            <x-text-input id="email" class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" value="パスワード" />
            <x-text-input id="password" class="block mt-1 w-full"
                type="password"
                name="password"
                required />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember -->
        <div class="block mt-4">
            <label class="flex items-center">
                <input type="checkbox" name="remember" class="rounded border-gray-300">
                <span class="ms-2 text-sm text-gray-600">ログイン状態を保持</span>
            </label>
        </div>

        <!-- Login Button -->
        <div class="flex items-center justify-end mt-4">

            <a class="underline text-sm text-gray-600 hover:text-gray-900"
               href="{{ route('password.request') }}">
                パスワードを忘れた場合
            </a>

            <x-primary-button class="ms-3">
                ログイン
            </x-primary-button>
        </div>
    </form>

    <!-- 区切り線 -->
    <div class="mt-6 flex items-center">
        <div class="flex-grow border-t"></div>
        <span class="px-3 text-sm text-gray-500">または</span>
        <div class="flex-grow border-t"></div>
    </div>

    <!-- Google Login -->
    <div class="mt-6">

        <a href="{{ route('google.redirect') }}"
           class="w-full flex items-center justify-center gap-2 px-4 py-2 border border-gray-300 rounded-md bg-white hover:bg-gray-50">

            <img src="https://www.svgrepo.com/show/475656/google-color.svg"
                 class="w-5 h-5" />

            <span class="text-sm text-gray-700">
                Googleでログイン
            </span>
        </a>

    </div>

</x-guest-layout>