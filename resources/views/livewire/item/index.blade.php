<div class="container">
    <div class="flex-container space-evenly">
        <h2>Items</h2>

        <a class="btn create" wire:click="create">Create</a>
    </div>

    <div class="table">
        <div class="table--row">
            <div class="table--cell table--head"></div>
            <div class="table--cell table--head">Name</div>
            <div class="table--cell table--head">Description</div>
            <div class="table--cell table--head">Image</div>
        </div>
        @foreach ($items as $item)
            <div class="table--row">
                <div class="table--cell table--select">
                </div>
                <div class="table--cell">
                    <a href="{{ route('item.show', ['item' => $item ]) }}" class="table--headline">
                        {{ $item->name }}
                    </a>
                </div>
                <div class="table--cell">
                    {{ $item->description }}
                </div>
                <div class="table--cell">
                    {{ $item->display_image }}
                </div>
            </div>
         @endforeach
    </div>
</div>
