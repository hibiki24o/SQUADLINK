<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-white text-glow leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="glass-panel overflow-hidden sm:rounded-xl hover:shadow-glow transition-all duration-300">
                <div class="p-8 text-gray-200 font-bold text-lg">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
