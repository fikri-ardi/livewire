<aside class="bg-gradient-to-b w-80 from-gray-900 to-gray-800 h-full text-gray-200 shadow-lg py-5 fixed z-20">
    {{-- Profile Photo --}}
    <div class="flex justify-center items-center">
        @livewire('profile-photo')
    </div>

    {{-- Menu --}}
    <ul>
        <x-li class="border-t-2" active="{{ request()->segment(1) == '' }}">
            <a href="{{ route('home') }}" class="py-3 flex items-center justify-start w-full h-full">
                <span class="iconly-brokenActivity text-2xl mr-3"></span>
                <span>Dashboard</span>
            </a>
        </x-li>

        <x-li active="{{ request()->segment(1) == 'users' }}">
            <a href="{{ route('users') }}" class="py-3 flex items-center justify-start w-full h-full">
                <span class="iconly-brokenUser1 text-2xl mr-3"></span>
                <span>Users</span>
            </a>
        </x-li>

        <x-li active="{{ request()->segment(1) == 'lessons' }}">
            <a href="{{ route('lessons') }}" class="py-3 flex items-center justify-start w-full h-full">
                <span class="iconly-brokenCalendar text-2xl mr-3"></span>
                <span>Lessons</span>
            </a>
        </x-li>

        <x-li active="{{ request()->segment(1) == 'attendances' }}">
            <a href="{{ route('attendances') }}" class="py-3 flex items-center justify-start w-full h-full">
                <span class="iconly-brokenGraph text-2xl mr-3"></span>
                <span>Attendances</span>
            </a>
        </x-li>

        <x-li active="{{ request()->segment(1) == 'presences' }}">
            <a href=" {{ route('presences') }}" class="py-3 flex items-center justify-start w-full h-full">
                <span class="iconly-brokenDocument text-2xl mr-3"></span>
                <span>Presence</span>
            </a>
        </x-li>
    </ul>
</aside>