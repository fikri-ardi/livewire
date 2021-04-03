<div>
    {{-- seperti two way data binding di alpine js, isi dari input akan selalu sinkron dengan variable name --}}
    <input wire:model="name" type="text">
    <input wire:model="age" type="number">

    {{ $name }}
    @if ($updated) updated! @endif
    <br>
    @if ($updatedAge) age updated! @endif
</div>