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

    {{-- variable $event, sama seperti parameter (event) => di js yang biasa kamu lakukan. --}}
    {{-- <button wire:click="resetName($event.target.innerText)">Reset Name</button> --}}

    {{-- prevent bekerja seperti event.preventDefault(), yaitu mencegah berjalannya sifat asli dari event yang saat ini sedang berjalan, misal tag a tidak akan mengikuti hrefnya, form tidak akan reload  --}}
    {{-- <form action="#" wire:submit.prevent="resetName('Dewi')">
        <button>Reset Name</button>
    </form> --}}

    {{-- atau --}}

    {{-- variable $set akan mengatur nilai variable name menjadi Dewi --}}
    <form action="#" wire:submit.prevent="$set('name', 'Dewi')">
        <button>Reset Name</button>
    </form>
</div>