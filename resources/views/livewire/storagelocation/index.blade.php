<div class="container">
    <div class="flex-container space-evenly">
        <h2>Storage Locations</h2>

        <a class="btn" wire:click="create">Create</a>
    </div>

    <div class="table">
        <div class="table--row">
            <div class="table--cell table--head"></div>
            <div class="table--cell table--head">Name</div>
            <div class="table--cell table--head">Description</div>
        </div>
        @foreach ($storageLocations as $location)
            <div class="table--row">
                <div class="table--cell table--select">
                </div>
                <div class="table--cell">
                    <a href="{{ route('storagelocation.show', ['location' => $location ]) }}" class="table--headline">
                        {{ $location->name }}
                    </a>
                </div>
                <div class="table--cell">
                    {{ $location->description }}
                </div>
            </div>
         @endforeach
    </div>
</div>
