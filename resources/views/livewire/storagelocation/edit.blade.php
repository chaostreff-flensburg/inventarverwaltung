<div class="form-container container">
    <h2>Edit Storagelocation</h2>

    <form wire:submit.prevent="updateStorageLocation">
        <fieldset>
            <legend>Name</legend>
            <input type="text" wire:model.debounce.500ms="name">
            <div class="helper-text">
                @error('name') <span class="error">{{ $message }}</span> @enderror
            </div>
        </fieldset>

        <fieldset>
            <legend>Description</legend>
            <input type="text" wire:model.debounce.500ms="description">
            <div class="helper-text">
                @error('description') <span class="error">{{ $message }}</span> @enderror
            </div>
        </fieldset>

        <button type="submit" class="btn">Update StorageLocation</button>
    </form>
</div>
