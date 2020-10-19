<div class="form-container container">
    <h2>Create Storagelocation</h2>

    <form wire:submit.prevent="saveStorageLocation">
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

        <button type="submit" class="btn">Save Item</button>
    </form>
</div>
