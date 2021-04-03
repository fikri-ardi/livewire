<div>
    @foreach ($names as $name)
    @livewire('say-hi', ['name' => $name])
    @endforeach
</div>