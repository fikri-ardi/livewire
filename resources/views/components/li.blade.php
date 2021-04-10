<li {{ $attributes->merge([
    'class'=> ($active ?? false) ? 'bg-gray-700 border-b-2 border-gray-700 px-10 py-3 flex items-center relative cursor-pointer hover:bg-gray-700 transition focus:bg-gray-700' : 'bg-gray-800 border-b-2 border-gray-700 px-10 py-3 flex items-center relative cursor-pointer hover:bg-gray-700 transition focus:bg-gray-700'
    ]) }}>
    {{ $slot }}
</li>