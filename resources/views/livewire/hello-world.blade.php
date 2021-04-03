<div>
    {{-- seperti two way data binding di alpine js, isi dari input akan selalu sinkron dengan variable name --}}
    <input wire:model="name" type="text">

    {{-- debounce adalah jeda atau waktu tunggu --}}
    {{-- <input wire:model.debounce.1000ms="name" type="text"> --}}

    {{-- lazy berarti request akan dikirim ketika input itu tidak dalam keadaan active --}}
    {{-- <input wire:model.lazy="name" type="text"> --}}

    <input wire:model="loud" type="checkbox">

    {{-- select akan menghasilkan value yang sinkron dengan variable greetings --}}
    <select wire:model="greetings" multiple>
        <option value="Hello">Hello</option>
        <option value="Goodbye">Goodbye</option>
        <option value="Adios">Adios</option>
    </select>

    {{ implode(', ', $greetings) }} {{ $name }} @if ($loud) ! @endif
</div>