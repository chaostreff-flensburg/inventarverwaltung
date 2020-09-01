<div>
    <form wire:submit.prevent="saveEntity">
        <input type="text" wire:model.debounce.500ms="identifier">
        @error('identifier') <span class="error">{{ $message }}</span> @enderror

        <select wire:model.debounce.500ms="item_id">
            @foreach($items as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        @error('item_id') <span class="error">{{ $message }}</span> @enderror

        <input type="checkbox" wire:model.debounce.500ms="consumable"> Consumable
        @error('consumable') <span class="error">{{ $message }}</span> @enderror

        <input type="number" wire:model.debounce.500ms="amount">
        @error('amount') <span class="error">{{ $message }}</span> @enderror

        <select wire:model.debounce.500ms="storagelocation_id">
        @foreach($storageLocations as $storageLocation)
            <option value="{{ $storageLocation->id }}">{{ $storageLocation->name }}</option>
            @endforeach
        </select>
        @error('storagelocation_id') <span class="error">{{ $message }}</span> @enderror

        <button type="submit">Save Item</button>
    </form>
</div>
