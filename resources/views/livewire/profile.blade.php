<x-slot name="sidebar">
    @livewire('sidebar')
</x-slot>

<div class="pt-16 px-16 flex flex-col justify-start">
    @livewire('navbar', ['user' => auth()->user()])
    @livewire('profile-photo')
    <form wire:submit.prevent="save">
        <x-form-group class="inline-block w-1/2 rounded-full text-gray-200 my-2">
            <span class="iconly-brokenProfile text-xl mr-2"></span>
            <x-input field="name" model="name" placeholder="Your name"></x-input>
        </x-form-group>
        <x-invalid-form-message field="name"></x-invalid-form-message>

        <x-form-group class="inline-block w-1/2 rounded-full text-gray-200 my-2">
            <span class="iconly-brokenMessage text-xl mr-2"></span>
            <x-input field="email" model="email" placeholder="Your email"></x-input>
        </x-form-group>
        <x-invalid-form-message field="email"></x-invalid-form-message>

        <div class="flex justify-end w-1/2 rounded-full text-gray-200 my-2">
            <x-button>Save</x-button>
        </div>

    </form>
</div>