<x-slot name="sidebar">
    @livewire('sidebar')
</x-slot>

<div class="pt-20 pl-96 pr-20">
    @livewire('navbar', ['user' => auth()->user()])

    <div x-data="getData()"> {{-- Alpinejs data --}}
        {{-- Header --}}
        <x-header icon="iconly-brokenCalendar" subject="Lessons" />

        {{-- Search Box --}}
        <x-search placeholder="Search lesson by name ..." />

        {{-- Table --}}
        <table class="my-5 table-auto rounded-md overflow-hidden" cellpadding="10">
            <thead class="bg-gray-800 text-gray-200">
                <tr>
                    <th class="font-thin">No.</th>
                    <th class="font-thin">Lesson Name</th>
                    <th class="font-thin">Created By</th>
                    <th class="font-thin">Started At</th>
                    <th class="font-thin">Ended At</th>
                    <th class="font-thin">Action</th>
                </tr>
            </thead>
            <tbody class="bg-gray-200">
                @forelse ($lessons as $lesson)
                <tr class="border-b border-gray-300">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $lesson->name }}</td>
                    <td>{{ $lesson->user->name }}</td>
                    <td>{{ $lesson->started_at }}</td>
                    <td>{{ $lesson->ended_at }}</td>

                    <td class="flex items-center">
                        @can(['update','delete'], $lesson)
                        <x-button wire:click="edit({{ $lesson }})" x-on:click="{open(), fillFormWith({{ $lesson }}), btnText = 'update'}"
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
                    <td colspan="6">
                        No lesson data found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Pagination --}}
        {{ $lessons->links() }}

        {{-- Add New Lesson --}}
        <div x-show="isOpen()" class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-30 z-30">
            <form wire:submit.prevent="{{ $method }}" x-on:click.away="{ close(), reset() }" x-on:submit="{ close(), reset() }"
                x-show.transition="isOpen()" class="absolute top-72 left-1/2 overflow-hidden">
                <x-form-group class="text-gray-200 rounded-tl-md rounded-tr-md flex-col">
                    <x-input field="name" model="name" x-model="name" placeholder="Lesson name" autofocus />
                </x-form-group>
                <x-invalid-form-message field="name" model="{{ $name }}" class="bg-gray-800 rounded-md px-2" />

                <x-form-group class="text-gray-200">
                    <x-input field="startedAt" model="startedAt" x-model="startedAt" placeholder="Started at" autofocus />
                </x-form-group>
                <x-invalid-form-message field="startedAt" model="{{ $startedAt }}" class="bg-gray-800 rounded-md px-2" />

                <x-form-group class="text-gray-200 rounded-bl-md rounded-br-md">
                    <x-input field="endedAt" model="endedAt" x-model="endedAt" placeholder="Ended at" autofocus />
                </x-form-group>
                <x-invalid-form-message field="endedAt" model="{{ $endedAt }}" class="bg-gray-800 rounded-md px-2" />

                <div class="flex justify-end mt-2">
                    <x-button x-text="btnText" class="bg-indigo-500 hover:bg-opacity-50 border-opacity-50" style="color: #fff">
                        add
                    </x-button>
                </div>
            </form>
        </div>

        <x-button wire:click="create()" x-on:click="{open(), btnText = 'add'}" class="fixed bottom-10 right-10">
            <span class="iconly-brokenPlus text-xl mr-1"></span>
            New Lesson
        </x-button>
    </div>
</div>
<script>
    function getData(){
        return {
            display:false,
            name: '',
            startedAt:'',
            endedAt:'',
            btnText:'add',

            open() { this.display = true },
            close() { this.display = false },
            reset() {
                this.name = '';
                this.startedAt = '';
                this.endedAt = '';
            },
            isOpen() { return this.display === true },
            fillFormWith(data) {
                this.name = data.name;
                this.startedAt = data.started_at;
                this.endedAt = data.ended_at;
             },
        }
    }
</script>