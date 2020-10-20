<div class="form-container container">
    <form wire:submit.prevent="saveEntity">
        <legend>@lang('views/itementity/refill.title')</legend>
        <h2>{{ $entity->identifier }}</h2>

        <fieldset>
            <legend>@lang('models/item.title.singular')</legend>
            {{ $entity->item->name }}
        </fieldset>

        <fieldset>
            <legend>@lang('models/itementity.attributes.amount')</legend>
            <input type="number" wire:model.debounce.500ms="amount">
            <div class="helper-text">
                @error('amount') <span class="error">{{ $message }}</span> @enderror
            </div>
        </fieldset>
        <button type="submit" class="btn">@lang('views/itementity/refill.submit')</button>
    </form>
</div>
