<div class="form-container container">
    <form wire:submit.prevent="saveEntity">
        <legend>Itementity</legend>
        <h2>{{ $entity->identifier }}</h2>

        <fieldset>
            <legend>Item</legend>
            {{ $entity->item->name }}
        </fieldset>

        <fieldset>
            <legend>Amount</legend>
            <input type="number" wire:model.debounce.500ms="amount">
            <div class="helper-text">
                @error('amount') <span class="error">{{ $message }}</span> @enderror
            </div>
        </fieldset>
        <button type="submit" class="btn">Save Entitiy</button>
    </form>
</div>
