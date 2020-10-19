<div class="container">
    <div class="flex-container space-evenly">
        <h2>Item Entities</h2>

        <a class="btn create" wire:click="create">Create</a>
    </div>

    <div class="table">
        <div class="table--row">
            <div class="table--cell table--head"></div>
            <div class="table--cell table--head">Identifier</div>
            <div class="table--cell table--head">Status</div>
            <div class="table--cell table--head">Tags</div>
            <div class="table--cell table--head">Location</div>
        </div>
        @foreach ($itementities as $itemEntity)
            <div class="table--row">
                <div class="table--cell table--select">
                </div>
                <div class="table--cell">
                    <a href="{{ route('itementity.show', ['itementity' => $itemEntity ]) }}" class="table--headline">
                        {{ $itemEntity->identifier }}
                    </a>
                    {{ $itemEntity->item->name }}
                </div>
                <div class="table--cell">
                    {{ $itemEntity->display_status }}
                </div>
                <div class="table--cell table--small">
                    <div class="table--inline-head">Tags</div>
                    @foreach($itemEntity->tags as $tag)
                    <a wire:click="addTag({{ $tag->id }})" class="tag">
                        {{ $tag->name }}
                    </a>
                    @endforeach
                </div>
                <div class="table--cell table--small">
                    <div class="table--inline-head">Storagelocation</div>
                    <a wire:click="addLocation({{ $itemEntity->storagelocation->id }})" class="tag">
                        {{ $itemEntity->storagelocation->name }}
                    </a>
                </div>
            </div>
         @endforeach
    </div>
</div>
