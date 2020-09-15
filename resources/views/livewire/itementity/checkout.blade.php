<div class="form-container container">
    <h2>Checkout</h2>

    <form wire:submit.prevent="saveEntity">
        <legend>Itementity</legend>
        <h2>{{ $entity->identifier }}</h2>

        <fieldset>
            <legend>Item</legend>
            <a href="{{ route('item.show', $entity->item) }}">{{ $entity->item->name }}</a>
        </fieldset>

        <fieldset>
            <legend>Borrowed by</legend>
            <input type="text" wire:model.debounce.500ms="borrowed_by">
            <div class="helper-text">
                @error('borrowed_by') <span class="error">{{ $message }}</span> @enderror
            </div>
        </fieldset>

        <button type="submit" class="btn">Checkout</button>
        <a class="btn" href="{{ route('itementity.show', $entity) }}">Cancel</a>
    </form>
</div>
