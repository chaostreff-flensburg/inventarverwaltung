<div class="container">
    <div class="flex-container space-evenly">
        <h2>@lang('views/storagelocation/index.title')</h2>

        <a class="btn create" wire:click="create">Create</a>
    </div>

    <div class="table">
        <div class="table--row">
            <div class="table--cell table--head"></div>
            <div class="table--cell table--head">@lang('models/storagelocation.attributes.name')</div>
            <div class="table--cell table--head">@lang('models/storagelocation.attributes.description')</div>
        </div>
        @foreach ($storagelocations as $location)
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
