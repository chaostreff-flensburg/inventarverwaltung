<div class="form-container container">
    <legend>Item</legend>
    <h2>{{ $item->name }}</h2>

    <fieldset>
        <legend>Description</legend>
        {{ $item->description }}
    </fieldset>

    <fieldset>
        <a class="btn" wire:click="delete">Delete Item</a>
    </fieldset>

    <fieldset>
        <legend>Itementities</legend>
    @foreach($item->entities as $entity)
        <a href="{{ route('itementity.show', $entity) }}">{{ $entity->identifier }}</a> ({{ $entity->display_status }})
    @endforeach
    </fieldset>
</div>
