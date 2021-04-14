<x-slot name="sidebar">
    @livewire('sidebar')
</x-slot>

<div class="pt-20 pl-96">
    <div x-data="{ display: false, name:'' }"> {{-- Alpinejs data --}}
        @livewire('navbar', ['user' => auth()->user()])

        {{-- Header --}}
        <div class="flex items-center">
            <span class="iconly-brokenCalendar text-4xl mr-2"></span>
            <h1 class="text-4xl text-gray-800">Activities</h1>
        </div>

        {{-- Table --}}
        <table class="my-5 table-auto rounded-md overflow-hidden" cellpadding="10">
            <thead class="bg-gray-800 text-gray-200">
                <tr>
                    <th>No.</th>
                    <th>Activity Name</th>
                    <th>Created By</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="bg-gray-200">
                @forelse ($activities as $activity)
                <tr class="border-b border-gray-300">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $activity->name }}</td>
                    <td>{{ $activity->user->name }}</td>
                    <td class="flex items-center">
                        <x-button wire:click="setMethodTo('update({{ $activity->id }})')" @click="{display = true, name = '{{ $activity->name }}'}"
                            class="mx-1 h-10 w-10 flex items-center justify-center">
                            <span class="iconly-brokenEdit-Square text-lg"></span>
                        </x-button>
                        <button wire:click="delete({{ $activity }})"
                            class="mx-1 border border-red-500 h-10 text-red-500 w-10 rounded-full hover:bg-red-500 hover:text-red-100 focus:bg-red-500 focus:text-red-100">
                            <span class="iconly-brokenDelete text-lg"></span>
                        </button>
                    </td>
                </tr>
                @empty
                <tr class="bg-yellow-200 text-yellow-500">
                    <td colspan="4">
                        No activity data found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Add New Activity --}}
        <div x-show="display" class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-30 z-30">
            <form @submit="{display = false, name = ''}" @click.away="{display = false, name = ''}" x-show.transition="display"
                wire:submit.prevent="{{ $method }}" class="absolute top-72 left-1/2 shadow-xl">
                <x-form-group class="text-gray-200 rounded-md">
                    <x-input field="name" model="name" x-model="name" placeholder="Activity name" autofocus />
                </x-form-group>
            </form>
        </div>

        <x-button @click="display = true" class="fixed bottom-10 right-10">
            <span class="iconly-brokenPlus text-xl mr-1"></span>
            New Activity
        </x-button>
    </div>
</div>