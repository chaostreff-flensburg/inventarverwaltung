<div class="form-container container">
    <legend>Storage Location</legend>
    <h2>{{ $location->name }}</h2>

    <fieldset>
        <legend>Description</legend>
        {{ $location->description }}
    </fieldset>

    <fieldset>
        <a class="btn" wire:click="edit">Edit Item</a>

        <a class="btn" wire:click="delete">Delete Item</a>
    </fieldset>

    @if (session()->has('message'))
        <div class="alert alert-danger">
            {{ session('message') }}
        </div>
    @endif

    <fieldset>
        <legend>Item Entities</legend>

        <div class="table">
            <div class="table--row">
                <div class="table--cell table--head"></div>
                <div class="table--cell table--head">Identifier</div>
                <div class="table--cell table--head">Status</div>
            </div>
            @foreach($location->itementities as $itemEntity)
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
            @endforeach
        </div>
    </fieldset>
</div>
