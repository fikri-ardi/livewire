<x-form-group {{ $attributes->merge(['class'=>'w-1/2 my-2 rounded-full text-gray-200']) }}>
    <span wire:loading.class="opacity-20 animate-spin" class="iconly-brokenSearch mr-3"></span>
    <x-input type="search" field="search" model="search" placeholder="{{ $placeholder ?? '' }}" />
</x-form-group>