<x-slot name="sidebar">
    @livewire('sidebar')
</x-slot>

<div class="pt-20 pl-96">
    @livewire('navbar')

    {{-- Header --}}
    <div class="flex items-center my-5">
        <span class="iconly-brokenUser text-4xl mr-2"></span>
        <h1 class="text-4xl text-gray-800">Users</h1>
    </div>

    {{-- Search Box --}}
    <x-form-group class="w-1/2 my-2 rounded-full text-gray-200 focus:border-opacity-0 focus:ring-gray-800">
        <span wire:loading.class="opacity-20 animate-spin" class="iconly-brokenSearch mr-3"></span>
        <x-input type="search" field="search" model="search" placeholder="Search user by email ..." />
    </x-form-group>

    {{-- Users List --}}
    <ol>
        @foreach ($users as $user)
        <li class="my-5 flex items-center">
            <span class="bg-gray-800 text-gray-200 flex justify-center items-center h-6 w-6 rounded-full mr-2 text-sm">{{ $loop->iteration }}</span>
            @livewire('profile-photo-viewer', ['size'=>'h-8 w-8', 'user' => $user], key($loop->index))
            <span>{{ $user->email }}</span>
        </li>
        @endforeach
        <div class="w-1/2 my-5">
            {{ $users->links() }}
        </div>
    </ol>
</div>