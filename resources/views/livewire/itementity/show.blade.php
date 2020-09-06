<div class="form-container container">
    <legend>Itementity</legend>
    <h2>{{ $itementity->identifier }}</h2>
    
    <fieldset>
        <legend>Item</legend>
        {{ $itementity->item->name }}
    </fieldset>

    <fieldset>
        <legend>Status</legend>
        {{ $itementity->status }}
    </fieldset>

    <fieldset>
        <legend>Borrowed by</legend>
        {{ $itementity->borrowed_by }}
    </fieldset>

    <fieldset>
        <legend>Storagelocation</legend>
        {{ $itementity->storagelocation->name }}
    </fieldset>

    <fieldset>
        <legend>Consumable</legend>
        {{ $itementity->consumable == 0 ? 'No' : 'Yes' }}
    </fieldset>

    @if ($itementity->consumable != 0)
    <fieldset>
        <legend>Current Amount</legend>
        {{ $itementity->amount }}
    </fieldset>
    @endif
</div>