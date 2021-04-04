<div>
    Hi {{ $contact->name }} {{ now() }}
    <button wire:click="$refresh">refresh</button>
</div>