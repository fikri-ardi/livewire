<x-slot name="sidebar">
    @livewire('sidebar')
</x-slot>

<div>
    @livewire('navbar', ['user' => auth()->user()])

</div>