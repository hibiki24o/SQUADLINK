@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'bg-black/40 border border-cyber-border text-white placeholder-gray-500 focus:border-cyber-accent focus:ring-cyber-accent focus:shadow-glow rounded-md shadow-sm transition-all duration-300']) }}>
