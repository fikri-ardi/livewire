<aside class="bg-gradient-to-b from-gray-900 to-gray-800 h-screen text-gray-200 shadow-lg py-5">
    {{-- Profile --}}
    <div class="h-52 flex items-center justify-center flex-col">
        @if ($profilePhotoUrl)
        <img src="{{ $profilePhotoUrl }}" class="rounded-full h-40 w-40 object-cover">
        @else
        <div class="iconly-brokenProfile text-8xl bg-white bg-opacity-40 p-5 rounded-full"></div>
        @endif
        <div class="my-3 text-lg font-semibold">{{ auth()->user()->email }}</div>
    </div>

    {{-- Menu --}}
    <ul>
        <x-li class="border-t-2" active="{{ request()->segment(1) == '' }}">
            <span class="iconly-brokenActivity text-2xl mr-3"></span>
            <span>Dashboard</span>
        </x-li>

        <x-li active="{{ request()->segment(1) == 'users' }}">
            <span class="iconly-brokenUser1 text-2xl mr-3"></span>
            <span>Users</span>
        </x-li>

        <x-li active="{{ request()->segment(1) == 'wallets' }}">
            <span class="iconly-brokenWallet text-2xl mr-3"></span>
            <span>E-wallet</span>
        </x-li>

        <x-li active="{{ request()->segment(1) == 'stats' }}">
            <span class="iconly-brokenGraph text-2xl mr-3"></span>
            <span>Stats</span>
        </x-li>

        <x-li active="{{ request()->segment(1) == 'activities' }}">
            <span class="iconly-brokenCalendar text-2xl mr-3"></span>
            <span>Activity</span>
        </x-li>
    </ul>
</aside>