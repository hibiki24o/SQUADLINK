<nav x-data="{ open: false }" class="glass-panel border-x-0 border-t-0 border-b border-cyber-border sticky top-0 z-50">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <div class="flex">

                <!-- Logo -->
                <div class="flex items-center gap-2">
                    <a href="{{ route('posts.index') }}" class="flex items-center gap-2 group">
                        <span class="text-2xl group-hover:scale-110 transition-transform">🎮</span>
                        <span class="text-xl md:text-2xl font-bold text-white text-glow">
                            SquadLink
                        </span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">

                    <x-nav-link :href="url('/')" :active="request()->is('/')">
                        HOME
                    </x-nav-link>

                    <x-nav-link :href="route('posts.index')" :active="request()->routeIs('posts.index')">
                        募集一覧
                    </x-nav-link>

                    <!-- 投稿する（未ログインならloginへ） -->
                    <x-nav-link
                        :href="Auth::check() ? route('posts.create') : route('login')"
                        :active="request()->routeIs('posts.create')">
                        投稿する
                    </x-nav-link>

                    <!-- 自分の投稿を見る（未ログインならloginへ） -->
                    <x-nav-link
                        :href="Auth::check() ? route('posts.my') : route('login')"
                        :active="request()->routeIs('posts.my')">
                        自分の投稿を見る
                    </x-nav-link>

                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">

                @auth
                    <x-dropdown align="right" width="48">

                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-300 hover:text-white hover:text-glow transition-all duration-200">
                                <div>{{ Auth::user()->name }}</div>
                                <svg class="ms-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                Profile
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    Log Out
                                </x-dropdown-link>
                            </form>
                        </x-slot>

                    </x-dropdown>
                @else
                    <div class="flex gap-4">
                        <a href="{{ route('login') }}" class="text-sm font-bold text-cyber-accent hover:text-cyber-hover hover:text-glow transition-all duration-200">
                            ログイン
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-sm font-bold text-cyber-accent hover:text-cyber-hover hover:text-glow transition-all duration-200">
                                新規登録
                            </a>
                        @endif
                    </div>
                @endauth

            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="p-2 text-gray-400 hover:text-gray-500 hover:bg-gray-100 rounded-md">

                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': ! open }" class="hidden"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>

                </button>
            </div>

        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': ! open }" class="hidden sm:hidden bg-cyber-bg/90 backdrop-blur-md border-b border-cyber-border">

        <div class="pt-2 pb-3 space-y-1">

            <x-nav-link :href="url('/')" :active="request()->is('/')">
                HOME
            </x-nav-link>

            <x-responsive-nav-link :href="route('posts.index')">
                募集一覧
            </x-responsive-nav-link>

            <x-responsive-nav-link
                :href="Auth::check() ? route('posts.create') : route('login')">
                投稿する
            </x-responsive-nav-link>

            <x-responsive-nav-link
                :href="Auth::check() ? route('posts.my') : route('login')">
                自分の投稿を見る
            </x-responsive-nav-link>

        </div>

        <!-- Responsive Auth -->
        <div class="pt-4 pb-1 border-t border-gray-200">

            @auth
                <div class="px-4">
                    <div class="font-medium text-base text-white">
                        {{ Auth::user()->name }}
                    </div>
                    <div class="font-medium text-sm text-gray-400">
                        {{ Auth::user()->email }}
                    </div>
                </div>

                <div class="mt-3 space-y-1">

                    <x-responsive-nav-link :href="route('profile.edit')">
                        Profile
                    </x-responsive-nav-link>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            Log Out
                        </x-responsive-nav-link>
                    </form>

                </div>
            @else
                <div class="px-4 py-2 space-y-2">
                    <a href="{{ route('login') }}" class="block text-cyber-accent font-bold">
                        ログイン
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="block text-cyber-accent font-bold">
                            新規登録
                        </a>
                    @endif
                </div>
            @endauth

        </div>

    </div>
</nav>