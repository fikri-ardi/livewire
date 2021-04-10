<button type="{{ $type ?? 'submit' }}"
    {{ $attributes->merge(['class'=>'border border-red-500 text-sm text-red-500 rounded-full px-3 py-2 flex items-center transition hover:bg-red-500 hover:text-gray-200 focus:bg-red-500 focus:text-gray-200 focus:outline-none uppercase']) }}">
    {{ $slot }}
</button>