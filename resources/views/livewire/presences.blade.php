<x-slot name="sidebar">
    @livewire('sidebar')
</x-slot>

<div class="pt-20 pl-96 pr-20">
    @livewire('navbar', ['user' => auth()->user()], key(auth()->user()->id))

    {{-- Header --}}
    <x-header icon="iconly-brokenDocument" subject="Presences" />

    {{-- Presences --}}
    <div class="my-7">
        @forelse ($presences as $presence)
        <div class="shadow-xl p-10 rounded-md">
            <h1 class="text-4xl">{{ $presence->attendance->subject }}</h1>

            <div class="flex items-center">
                <span class="text-gray-500 text-xs flex p-2 items-center my-2 bg-gray-200 shadow-lg rounded-full mr-2">
                    <span class="iconly-brokenProfile text-lg"></span>
                    Admin
                </span>

                <span class="text-gray-500 text-xs flex p-2 items-center my-2 bg-gray-200 shadow-lg rounded-full mr-2">
                    <span class="iconly-brokenTime-Circle text-lg mr-1"></span>
                    04 May 2021 7.00
                </span>
            </div>

            <div class="flex items-center my-8">
                <div>
                    <span class="mt-5 font-semibold text-xl">Hadir - </span>
                    <span class="mt-3 mb-5 opacity-70 text-2xl">90%</span>
                    <div class="relative my-5 flex items-center">
                        <span class="absolute bg-gray-200 rounded-full shadow w-52 h-2"></span>
                        <span class="absolute bg-gradient-to-r from-gray-800 to-gray-600 rounded-full shadow w-44 h-2 animate-width"></span>
                    </div>
                </div>

                <div class="ml-40">
                    <span class="mt-5 font-semibold text-xl">Izin - </span>
                    <span class="mt-3 mb-5 opacity-70 text-2xl">10%</span>
                    <div class="relative my-5 flex items-center">
                        <span class="absolute bg-gray-200 rounded-full shadow w-52 h-2"></span>
                        <span class="absolute bg-gradient-to-r from-gray-800 to-gray-600 rounded-full shadow w-40 h-2 animate-width"></span>
                    </div>
                </div>

                <div class="ml-48">
                    <span class="mt-5 font-semibold text-xl">Sakit - </span>
                    <span class="mt-3 mb-5 opacity-70 text-2xl">12%</span>
                    <div class="relative my-5 flex items-center">
                        <span class="absolute bg-gray-200 rounded-full shadow w-52 h-2"></span>
                        <span class="absolute bg-gradient-to-r from-gray-800 to-gray-600 rounded-full shadow w-40 h-2 animate-width"></span>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="bg-yellow-200 text-yellow-600 p-5 rounded-md">No presences data found.</div>
        @endforelse
    </div>

</div>