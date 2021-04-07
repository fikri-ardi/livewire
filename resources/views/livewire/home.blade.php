<div>
    <h1>Halo {{ auth()->user()->email }} !</h1>
    <x-button wire:click="logout">Logout</x-button>
</div>