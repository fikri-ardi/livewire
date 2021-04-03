<div>
    @foreach ($names as $name)
    @livewire('say-hi', compact('name'))
    @endforeach
</div>