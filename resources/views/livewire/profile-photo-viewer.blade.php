<div class="m-1">
    @if($profilePhotoUrl)
    <img src="{{ $profilePhotoUrl }}" class="rounded-full {{ $size }} object-cover shadow-md">
    @else
    <div
        class="iconly-brokenProfile text-xl flex items-center justify-center bg-white bg-opacity-40 {{ $size }} rounded-full shadow-md text-gray-800">
    </div>
    @endif
</div>