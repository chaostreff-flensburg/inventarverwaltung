<div class="container">
    <h2>@lang('views/storagelocation/index.title')</h2>

    <div class="table">
        <div class="table--row">
            <div class="table--cell table--head"></div>
            <div class="table--cell table--head">@lang('models/storagelocation.attributes.name')</div>
            <div class="table--cell table--head">@lang('models/storagelocation.attributes.description')</div>
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
