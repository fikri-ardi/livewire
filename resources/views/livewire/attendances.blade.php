<x-slot name="sidebar">
    @livewire('sidebar')
</x-slot>

<div class="pt-20 pl-96 pr-20">
    @livewire('navbar', ['user' => auth()->user()])

    <div x-data="getData()"> {{-- Alpinejs data --}}
        {{-- Header --}}
        <x-header icon="iconly-brokenGraph" subject="Attendances" />

        {{-- Search --}}
        <x-search placeholder="Search attendances by subject ..." />

        {{-- Table --}}
        <table class="my-5 table-auto rounded-md overflow-hidden" cellpadding="10">
            <thead class="bg-gray-800 text-gray-200">
                <tr>
                    <th class="font-thin">No.</th>
                    <th class="font-thin">Subject</th>
                    <th class="font-thin">From Lesson</th>
                    <th class="font-thin">Started At</th>
                    <th class="font-thin">Ended At</th>
                    <th class="font-thin">Action</th>
                </tr>
            </thead>
            <tbody class="bg-gray-200">
                @forelse ($attendances as $attendance)
                <tr class="border-b border-gray-300">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $attendance->subject }}</td>
                    <td>{{ $attendance->lesson->name }}</td>
                    <td>{{ $attendance->started_at }}</td>
                    <td>{{ $attendance->ended_at }}</td>

                    <td class="flex items-center">
                        <x-button wire:click="edit({{ $attendance }})" x-on:click="{ open(), btnText = 'update' }"
                            class="mx-1 h-10 w-10 flex items-center justify-center">
                            <span class="iconly-brokenEdit-Square text-lg"></span>
                        </x-button>

                        <button wire:click="destroy({{ $attendance }})"
                            class="mx-1 border border-red-500 h-10 text-red-500 w-10 rounded-full hover:bg-red-500 hover:text-red-100 focus:bg-red-500 focus:text-red-100">
                            <span class="iconly-brokenDelete text-lg"></span>
                        </button>
                    </td>
                </tr>
                @empty
                <tr class="bg-yellow-200 text-yellow-500">
                    <td colspan="6">
                        No attendance data found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div x-show="isOpen()" class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-30 z-30">
            <form wire:submit.prevent="{{ $method }}" x-on:click.away="{ close() }" x-on:submit="{ close() }" x-show.transition="isOpen()"
                class="absolute top-72 left-1/2 overflow-hidden">
                <x-form-group class="text-gray-200 rounded-tl-md rounded-tr-md flex-col">
                    <x-input field="subject" model="subject" placeholder="Attendances subject" autofocus />
                </x-form-group>
                <x-invalid-form-message field="subject" model="{{ $subject }}" class="bg-gray-800 rounded-md px-2" />

                <x-form-group class="text-gray-200">
                    <select name="lessonId" wire:model="lessonId" class="bg-gray-800 text-white cursor-pointer w-full appearance-none outline-none">
                        <option value="" selected>Choose lesson</option>
                        @forelse ($lessons as $lesson)
                        <option value="{{ $lesson->id }}">{{ $lesson->name }}</option>
                        @empty
                        <option disabled>No lesson data found.</option>
                        @endforelse
                    </select>
                    <span class="iconly-brokenArrow---Down-2 absolute right-10 pointer-events-none"></span>
                </x-form-group>
                <x-invalid-form-message field="lessonId" model="{{ $lessonId }}" class="bg-gray-800 rounded-md px-2" />

                <x-form-group class="text-gray-200">
                    <x-input field="startedAt" model="startedAt" placeholder="Started at" autofocus />
                </x-form-group>
                <x-invalid-form-message field="startedAt" model="{{ $startedAt }}" class="bg-gray-800 rounded-md px-2" />

                <x-form-group class="text-gray-200 rounded-bl-md rounded-br-md">
                    <x-input field="endedAt" model="endedAt" placeholder="Ended at" autofocus />
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
            btnText:'add',
            
            open() { this.display = true },
            close() { this.display = false },

            isOpen() { return this.display === true },
        }
    }
</script>