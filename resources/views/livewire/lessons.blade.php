<x-slot name="sidebar">
    @livewire('sidebar')
</x-slot>

<div class="pt-20 pl-96 pr-20">
    <div x-data="{ display: false, name:'' }"> {{-- Alpinejs data --}}
        @livewire('navbar', ['user' => auth()->user()])

        {{-- Header --}}
        <div class="flex items-center">
            <span class="iconly-brokenCalendar text-4xl mr-2"></span>
            <h1 class="text-4xl text-gray-800">Lessons</h1>
        </div>

        {{-- Search Box --}}
        <x-form-group class="w-1/2 my-2 rounded-full text-gray-200">
            <span wire:loading.class="opacity-20 animate-spin" class="iconly-brokenSearch mr-3"></span>
            <x-input type="search" field="search" model="search" placeholder="Search a lesson ..." />
        </x-form-group>

        {{-- Table --}}
        <table class="my-5 table-auto rounded-md overflow-hidden" cellpadding="10">
            <thead class="bg-gray-800 text-gray-200">
                <tr>
                    <th>No.</th>
                    <th>Lesson Name</th>
                    <th>Created By</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="bg-gray-200">
                @forelse ($lessons as $lesson)
                <tr class="border-b border-gray-300">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $lesson->name }}</td>
                    <td>{{ $lesson->user->name }}</td>
                    <td class="flex items-center">
                        @can(['update','delete'], $lesson)
                        <x-button wire:click="setMethodTo('update({{ $lesson->id }})')" @click="{display = true, name = '{{ $lesson->name }}'}"
                            class="mx-1 h-10 w-10 flex items-center justify-center">
                            <span class="iconly-brokenEdit-Square text-lg"></span>
                        </x-button>
                        <button wire:click="delete({{ $lesson }})"
                            class="mx-1 border border-red-500 h-10 text-red-500 w-10 rounded-full hover:bg-red-500 hover:text-red-100 focus:bg-red-500 focus:text-red-100">
                            <span class="iconly-brokenDelete text-lg"></span>
                        </button>
                        @else
                        <div class="flex justify-center w-full">
                            <span class="iconly-brokenLock"></span>
                            <span class="text-xs">Not yours.</span>
                        </div>
                        @endcan
                    </td>
                </tr>
                @empty
                <tr class="bg-yellow-200 text-yellow-500">
                    <td colspan="4">
                        No lesson data found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <span wire:loading.delay class="p-4 rounded-md shadow-xl flex items-center transition ease-out animate-pop w-min">
            Loading...
        </span>

        {{ $lessons->links() }}

        {{-- Add New Lesson --}}
        <div x-show="display" class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-30 z-30">
            <form @submit="{display = false, name = ''}" @click.away="{display = false, name = ''}" x-show.transition="display"
                wire:submit.prevent="{{ $method }}" class="absolute top-72 left-1/2 shadow-xl">
                <x-form-group class="text-gray-200 rounded-md">
                    <x-input field="name" model="name" x-model="name" placeholder="Lesson name" autofocus />
                </x-form-group>
            </form>
        </div>

        <x-button @click="display = true" class="fixed bottom-10 right-10">
            <span class="iconly-brokenPlus text-xl mr-1"></span>
            New lesson
        </x-button>
    </div>
</div>