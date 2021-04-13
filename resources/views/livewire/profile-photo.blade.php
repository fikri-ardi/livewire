<form wire:submit.prevent="save" class="mb-4">
    <div x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
        x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false"
        x-on:livewire-upload-progress="progress = $event.detail.progress">

        {{-- Profile Photo--}}
        <div class="group relative flex justify-center items-center flex-col">
            {{-- Input Photo --}}
            <div class="group-hover:opacity-100 transition ease-out opacity-0 h-12 w-12 m-auto absolute items-center justify-center">
                <input id="file-input" type="file" name="profilePhoto" wire:model="profilePhoto"
                    class="w-full h-full absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 cursor-pointer opacity-0">
                <div
                    class="iconly-brokenImage absolute z-10 pointer-events-none top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-indigo-500 text-indigo-100 text-2xl appearance-none p-2 rounded-full hover:opacity-5">
                </div>
            </div>

            {{-- Photo --}}
            @if ($profilePhoto)
            <img src="{{ $profilePhoto->temporaryUrl() }}" class="rounded-full h-40 w-40 object-cover shadow-md">
            @else
            @livewire('profile-photo-viewer', ['user'=>auth()->user()])
            @endif

            <!-- Progress Bar -->
            <div x-show="isUploading">
                <progress max="100" x-bind:value="progress"></progress>
            </div>

            @if ($profilePhoto)
            <x-button class="mt-2">Save Photo</x-button>
            @endif
        </div>
        <x-invalid-form-message field="profilePhoto" model="{{ $profilePhoto }}" class="text-center" />
    </div>
</form>