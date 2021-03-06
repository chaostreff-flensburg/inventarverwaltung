<div class="form-container container">
    <h2>@lang('views/storagelocation/edit.title')</h2>

    <form wire:submit.prevent="saveStoragelocation">
        <fieldset>
            <legend>@lang('models/storagelocation.attributes.name')</legend>
            <input type="text" wire:model.debounce.500ms="name">
            <div class="helper-text">
                @error('name') <span class="error">{{ $message }}</span> @enderror
            </div>
        </fieldset>

        <fieldset>
            <legend>@lang('models/storagelocation.attributes.description')</legend>
            <input type="text" wire:model.debounce.500ms="description">
            <div class="helper-text">
                @error('description') <span class="error">{{ $message }}</span> @enderror
            </div>
        </fieldset>

        <button type="submit" class="btn">@lang('views/storagelocation/edit.submit')</button>
    </form>
</div>
