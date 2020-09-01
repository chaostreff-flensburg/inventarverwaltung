<div>
    <div class="form-container">
        <form>
            <legend>Search</legend>
            <input wire:model.debounce.500ms="search" type="text">
            <p>
            @foreach($selectedTags as $tag)
                <a wire:click="removeTag({{ $tag->id }})" class="tag">
                    {{ $tag->name }}
                    <span class="font-normal">x</span>
                </a>
            @endforeach
            @foreach($selectedLocations as $location)
                <a wire:click="removeLocation({{ $location->id }})" class="tag">
                    {{ $location->name }}
                    <span class="font-normal">x</span>
                </a>
            @endforeach
            </p>
        </form>
    </div>

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
