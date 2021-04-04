<div>
    @foreach ($contacts as $contact)
    <div>
        @livewire('say-hi', compact('contact'))
    </div>
    @endforeach

    <hr>

    {{ now() }}

    <button wire:click="refreshChildren">refresh children</button>
</div>