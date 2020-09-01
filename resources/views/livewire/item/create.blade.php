<div>
    <form wire:submit.prevent="saveItem">
        <input type="text" wire:model.debounce.500ms="name">
        @error('name') <span class="error">{{ $message }}</span> @enderror

        <input type="text" wire:model.debounce.500ms="description">
        @error('description') <span class="error">{{ $message }}</span> @enderror

        <button type="submit">Save Item</button>
    </form>
</div>
