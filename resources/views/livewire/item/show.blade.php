<div class="form-container container">
    <legend>@lang('views/item/show.title')</legend>
    <h2>{{ $item->name }}</h2>

    <fieldset>
        <legend>@lang('models/item.attributes.description')</legend>
        {{ $item->description }}
    </fieldset>

    <fieldset>
        <a class="btn" wire:click="edit">@lang('views/item/show.edit')</a>
        <a class="btn" wire:click="delete">@lang('views/item/show.delete')</a>
    </fieldset>

    <fieldset>
        <legend>@lang('models/itementity.title.plural')</legend>
    @foreach($item->entities as $entity)
        <a href="{{ route('itementity.show', $entity) }}">{{ $entity->identifier }}</a> ({{ $entity->display_status }})
    @endforeach
    </fieldset>
</div>
