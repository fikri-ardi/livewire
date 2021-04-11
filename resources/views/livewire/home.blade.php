<x-slot name="sidebar">
    @livewire('sidebar')
</x-slot>

<div class="flex flex-col h-full justify-center items-center">
    <p class="text-xl">Halo {{ auth()->user()->email }} !</p>
    <x-button wire:click="logout" class="my-2">
        <span class="iconly-brokenLogout text-xl mr-1"></span>
        Logout
    </x-button>
</div>