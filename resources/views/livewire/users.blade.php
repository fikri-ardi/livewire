<x-slot name="sidebar">
    @livewire('sidebar')
</x-slot>

<div class="pt-14 pl-96">
    @livewire('navbar')

    {{-- Search Box --}}
    <x-form-group class="w-1/2 my-2 rounded-full text-gray-200">
        <span class="iconly-brokenSearch mr-3"></span>
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
    </ol>
</div>