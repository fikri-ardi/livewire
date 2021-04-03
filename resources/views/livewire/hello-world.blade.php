<div>
    @foreach ($contacts as $contact)
    <div>
        @livewire('say-hi', compact('contact'))

        <button wire:click="removeContact('{{ $contact->id }}')">Remove</button>
    </div>
    @endforeach

    <hr>
    {{ now() }}
</div>