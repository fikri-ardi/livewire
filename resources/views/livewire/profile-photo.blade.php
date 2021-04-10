<form wire:submit.prevent="save">
    <div>
        <div x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
            x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false"
            x-on:livewire-upload-progress="progress = $event.detail.progress">

            <label>Profile Photo</label><br>
            <input type="file" name="profilePhoto" wire:model="profilePhoto">
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