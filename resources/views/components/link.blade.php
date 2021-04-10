<a {{ $attributes->merge(['class'=>'text-sm hover:underline focus:underline focus:outline-none active:underline text-purple-400']) }}
    href="{{ $href }}">{{ $slot }}</a>