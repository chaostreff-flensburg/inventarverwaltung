<div class="form-container container">
    <h2>@lang('views/itementity/checkout.title')</h2>

    <form wire:submit.prevent="saveEntity">
        <legend>@lang('models/itementitiy.title.singular')</legend>
        <h2>{{ $entity->identifier }}</h2>

        <fieldset>
            <legend>@lang('models/item.title.singular')</legend>
            <a href="{{ route('item.show', $entity->item) }}">{{ $entity->item->name }}</a>
        </fieldset>

        <fieldset>
            <legend>@lang('views/itementity/checkout.borrowed')</legend>
            <input type="text" wire:model.debounce.500ms="borrowed_by">
            <div class="helper-text">
                @error('borrowed_by') <span class="error">{{ $message }}</span> @enderror
            </div>
        </fieldset>

        <button type="submit" class="btn">@lang('views/itementity/checkout.checkout')</button>
        <a class="btn" href="{{ route('itementity.show', $entity) }}">@lang('views/itementity/checkout.cancel')</a>
    </form>
</div>
