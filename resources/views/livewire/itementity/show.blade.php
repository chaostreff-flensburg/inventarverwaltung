<div class="form-container container">
    <legend>@lang('views/itementity/show.title')</legend>
    <h2>{{ $entity->identifier }}</h2>

    <fieldset>
        <legend>@lang('views/item/title.singular')</legend>
        <a href="{{ route('item.show', $entity->item) }}">{{ $entity->item->name }}</a>
    </fieldset>

    <fieldset>
        <legend>@lang('views/itementity/checkout.status')</legend>
        {{ $entity->display_status }}
    </fieldset>

    @if ($entity->consumable == 0)
    <fieldset>
        <legend>@lang('views/itementity/checkout.borrowed')</legend>
        {{ $entity->borrowed_by }}
    </fieldset>
    @endif

    <fieldset>
        <legend>@lang('views/storagelocation/title.singular')</legend>
        {{ $entity->storagelocation->name }}
    </fieldset>

    <fieldset>
        <legend>@lang('views/itementity/checkout.consumable')</legend>
        {{ $entity->consumable == 0 ? 'No' : 'Yes' }}
    </fieldset>

    @if ($entity->consumable != 0)
    <fieldset>
        <legend>@lang('views/itementity/checkout.amount')</legend>
        {{ $entity->amount }}
    </fieldset>
    @endif

    <fieldset>
    @if ($entity->consumable != 0)
    <a class="btn" wire:click="pick">@lang('views/itementity/show.pick')Pick a Item</a>
    <a class="btn" href="{{ route('itementity.refill', $entity) }}">@lang('views/itementity/show.refill')Refill</a>
    @else
        @if ($entity->status == 1)
            <a class="btn" wire:click="checkout">@lang('views/itementity/show.checkout')Checkout</a>
        @else
            <a class="btn" wire:click="checkin">@lang('views/itementity/show.checkin')Checkin</a>
        @endif
        <a class="btn" wire:click="lost">@lang('views/itementity/show.lost')Lost</a>
    @endif
    <a class="btn" wire:click="delete">@lang('views/itementity/show.delete')Delete Itementity</a>
    </fieldset>
</div>
