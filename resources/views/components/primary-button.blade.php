<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex justify-center items-center px-4 py-2 bg-cyber-accent border border-transparent rounded-md font-bold text-xs text-black uppercase tracking-widest hover:bg-cyber-hover hover:shadow-glow hover:-translate-y-0.5 focus:bg-cyber-hover focus:outline-none focus:ring-2 focus:ring-cyber-accent focus:ring-offset-2 focus:ring-offset-gray-900 active:scale-95 transition-all duration-300 ease-in-out']) }}>
    {{ $slot }}
</button>
