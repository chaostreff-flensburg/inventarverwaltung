<div class="form-container container">
    <h2>@lang('views/itementity/create.title')</h2>

    <form wire:submit.prevent="saveEntity">
        <fieldset>
            <legend>@lang('models/itementity.attributes.identifier')</legend>
            <input type="text" wire:model.debounce.500ms="identifier">
            <div class="helper-text">
                @error('identifier') <span class="error">{{ $message }}</span> @enderror
            </div>
        </fieldset>

        <fieldset>
            <legend>@lang('models/item.title.singular')</legend>
            <select wire:model.debounce.500ms="item_id">
                <option value="">
                    Select Item
                </option>
                @foreach($items as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
            <div class="helper-text">
                @error('item_id') <span class="error">{{ $message }}</span> @enderror
            </div>
        </fieldset>

        <fieldset>
            <legend>@lang('models/itementity.attributes.consumable')</legend>
            <input type="checkbox" wire:model.debounce.500ms="consumable">
            <div class="helper-text">
                @error('consumable') <span class="error">{{ $message }}</span> @enderror
            </div>
        </fieldset>

        <fieldset>
            <legend>@lang('models/itementity.attributes.amount')</legend>
            <input type="number" wire:model.debounce.500ms="amount">
            <div class="helper-text">
                @error('amount') <span class="error">{{ $message }}</span> @enderror
            </div>
        </fieldset>

        <fieldset>
            <legend>@lang('models/storagelocation.title.singular')</legend>
            <select wire:model.debounce.500ms="storagelocation_id">
                <option value="">
                    Select Storagelocation
                </option>
            @foreach($storageLocations as $storageLocation)
                <option value="{{ $storageLocation->id }}">{{ $storageLocation->name }}</option>
                @endforeach
            </select>
            <div class="helper-text">
                @error('storagelocation_id') <span class="error">{{ $message }}</span> @enderror
            </div>
        </fieldset>

        <button type="submit" class="btn">@lang('views/itementity/create.submit')</button>
    </form>
</div>
