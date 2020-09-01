<div>
    <a href="{{ route('item.create') }}" class="btn">Neues Item</a>
    <a href="{{ route('itementity.create') }}" class="btn">Neues Itementity</a>

    <input wire:model.debounce.500ms="search" type="text">
    <p>
        Suche aktuell: {{ $search }}
    </p>
    <p>
    @foreach($selectedTags as $tag)
        <a wire:click="removeTag({{ $tag->id }})" class="tag">
            {{ $tag->name }}
            <span class="font-normal">x</span>
        </a>
    @endforeach
    </p>
    <p>
    @foreach($selectedLocations as $location)
        <a wire:click="removeLocation({{ $location->id }})" class="tag">
            {{ $location->name }}
            <span class="font-normal">x</span>
        </a>
    @endforeach
    </p>

    @foreach ($itemEntities as $itemEntity)
        <div>
            {{ $itemEntity->item->name }}

            @foreach($itemEntity->tags as $tag)
            <a wire:click="addTag({{ $tag->id }})" class="tag">
                {{ $tag->name }}
            </a>
            @endforeach

            <a wire:click="addLocation({{ $itemEntity->storagelocation->id }})" class="tag">
                {{ $itemEntity->storagelocation->name }}
            </a>
        </div>
    @endforeach

    {{ $itemEntities->links() }}
</div>
