<x-slot name="sidebar">
    @livewire('sidebar')
</x-slot>

<div class="pt-20 pl-96">
    @livewire('navbar')

    {{-- Header --}}
    <x-header icon="iconly-brokenUser1" subject="Users" />

    {{-- Search Box --}}
    <x-search placeholder="Search user by email ..." />

    {{-- Users List --}}
    <ol>
        @forelse ($users as $user)
        <li class="my-5 flex items-center">
            <span class="bg-gray-800 text-gray-200 flex justify-center items-center h-6 w-6 rounded-full mr-2 text-sm">{{ $loop->iteration }}</span>
            @livewire('profile-photo-viewer', ['size'=>'h-8 w-8', 'user' => $user], key($loop->index))
            <span>{{ $user->email }}</span>
        </li>
        @empty
        <div class="bg-yellow-200 text-yellow-500 p-3 rounded w-1/2">No user data found.</div>
        @endforelse
        <div class="w-1/2 my-5">
            {{ $users->links() }}
        </div>
    </ol>
</div>