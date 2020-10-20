<div class="form-container container">
    <h2>@lang('views/item/create.title')</h2>

    <form wire:submit.prevent="saveItem">
        <fieldset>
            <legend>@lang('models/item.attributes.name')</legend>
            <input type="text" wire:model.debounce.500ms="name">
            <div class="helper-text">
                @error('name') <span class="error">{{ $message }}</span> @enderror
            </div>
        </fieldset>

        <fieldset>
            <legend>@lang('models/item.attributes.description')</legend>
            <input type="text" wire:model.debounce.500ms="description">
            <div class="helper-text">
                @error('description') <span class="error">{{ $message }}</span> @enderror
            </div>
        </fieldset>

        <button type="submit" class="btn">@lang('views/item/create.submit')</button>
    </form>
</div>
