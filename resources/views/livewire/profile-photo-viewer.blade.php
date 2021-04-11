<div>
    @if($profilePhotoUrl)
    <img src="{{ $profilePhotoUrl }}" class="rounded-full {{ $size }} object-cover shadow-md">
    @else
    <div class="iconly-brokenProfile text-8xl bg-white bg-opacity-40 p-5 rounded-full shadow-md text-gray-800"></div>
    @endif
</div>