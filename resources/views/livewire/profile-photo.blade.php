<form wire:submit.prevent="save">
    <div>
        <div x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
            x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false"
            x-on:livewire-upload-progress="progress = $event.detail.progress">

            <label>Profile Photo</label><br>
            <div class="relative h-14 w-14 my-3 mx-auto">
                <input id="file-input" type="file" name="profilePhoto" wire:model="profilePhoto"
                    class="border border-gray-800 w-full h-full absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 opacity-0 cursor-pointer">
                <div
                    class="iconly-brokenImage absolute z-10 pointer-events-none top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-indigo-500 text-indigo-100 text-4xl appearance-none p-2 rounded-full hover:opacity-5">
                </div>
            </div>

            @if ($profilePhoto)
            <img src="{{ $profilePhoto->temporaryUrl() }}" width="300" class="rounded-full my-3 w-60 h-60 object-cover">
            @endif
            <x-invalid-form-message field="profilePhoto" model="{{ $profilePhoto }}" />

            <!-- Progress Bar -->
            <div x-show="isUploading">
                <progress max="100" x-bind:value="progress"></progress>
            </div>
        </div>
        <x-button>Save Photo</x-button>
    </div>
</form>