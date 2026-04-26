<button {{ $attributes->merge([
    'class' => 'bg-blue-600 text-white hover:bg-blue-700 font-semibold px-4 py-2 rounded-lg'
]) }}>
    {{ $slot }}
</button>