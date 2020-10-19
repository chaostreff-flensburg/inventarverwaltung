<div class="container">
    <h2>Storage Locations</h2>

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
                    {{ $location->name }}
                </div>
                <div class="table--cell">
                    {{ $location->description }}
                </div>
            </div>
         @endforeach
    </div>
</div>
