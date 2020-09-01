<div class="container">
    <h2>Itementities</h2>

    <div class="form-container">
        <form>
            <fieldset>
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
            </fieldset>
        </form>
    </div>

    <div class="table">
        <div class="table--row">
            <div class="table--cell table--head">Identifier</div>
            <div class="table--cell table--head">Status</div>
            <div class="table--cell table--head">Tags</div>
            <div class="table--cell table--head">Location</div>
        </div>
    @foreach ($itemEntities as $itemEntity)
        <div class="table--row">
            <div class="table--cell">
                <div>{{ $itemEntity->identifier }}</div>
                {{ $itemEntity->item->name }}
            </div>
            <div class="table--cell">
                {{ $itemEntity->status }}
            </div>
            <div class="table--cell">
                @foreach($itemEntity->tags as $tag)
                <a wire:click="addTag({{ $tag->id }})" class="tag">
                    {{ $tag->name }}
                </a>
                @endforeach
            </div>
            <div class="table--cell">
                <a wire:click="addLocation({{ $itemEntity->storagelocation->id }})" class="tag">
                    {{ $itemEntity->storagelocation->name }}
                </a>
            </div>
        </div>
    @endforeach
    </div>

    {{ $itemEntities->links() }}
</div>
