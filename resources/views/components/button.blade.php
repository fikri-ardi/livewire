<button type="{{ $type ?? 'submit' }}"
    {{ $attributes->merge(['class'=>'border border-indigo-500 text-sm text-indigo-500 rounded-full px-3 py-2 flex items-center transition hover:bg-indigo-500 hover:text-indigo-100 focus:bg-indigo-500 focus:text-indigo-100 focus:outline-none uppercase font-semibold']) }}">
    {{ $slot }}
</button>