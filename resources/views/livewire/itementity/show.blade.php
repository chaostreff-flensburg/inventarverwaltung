<div class="form-container container">
    <legend>Itementity</legend>
    <h2>{{ $entity->identifier }}</h2>
    
    <fieldset>
        <legend>Item</legend>
        <a href="{{ route('item.show', $entity->item) }}">{{ $entity->item->name }}</a>
    </fieldset>

    <fieldset>
        <legend>Status</legend>
        {{ $entity->display_status }}
    </fieldset>

    @if ($entity->consumable == 0)
    <fieldset>
        <legend>Borrowed by</legend>
        {{ $entity->borrowed_by }}
    </fieldset>
    @endif

    <fieldset>
        <legend>Storagelocation</legend>
        {{ $entity->storagelocation->name }}
    </fieldset>

    <fieldset>
        <legend>Consumable</legend>
        {{ $entity->consumable == 0 ? 'No' : 'Yes' }}
    </fieldset>

    @if ($entity->consumable != 0)
    <fieldset>
        <legend>Current Amount</legend>
        {{ $entity->amount }}
    </fieldset>
    @endif

    <fieldset>
    @if ($entity->consumable != 0)
    <a class="btn" wire:click="pick">Pick a Item</a>
    <a class="btn" href="{{ route('itementity.refill', $entity) }}">Refill</a>
    @else
        @if ($entity->status == 1)
            <a class="btn" wire:click="checkout">Checkout</a>
        @else
            <a class="btn" wire:click="checkin">Checkin</a>
        @endif
        <a class="btn" wire:click="lost">Lost</a>
    @endif
    <a class="btn" wire:click="delete">Delete Itementity</a>
    </fieldset>
</div>