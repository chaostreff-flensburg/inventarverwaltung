@extends('layout.app')

@section('content')
<div class="mx-10 lg:mx-auto">
    <h1 class="headline">Inventarverwaltung</h1>

    @include('inventory.searchform')

    <div class="rounded overflow-hidden lg:shadow lg:bg-white mb-20">
        <div class="flex flex-wrap">
            <div class="w-full hidden lg:block lg:w-1/6 table__header__column">Image</div>
            <div class="w-full hidden lg:block lg:w-1/6 table__header__column">Name</div>
            <div class="w-full hidden lg:block lg:w-1/6 table__header__column">Tags</div>
            <div class="w-full hidden lg:block lg:w-1/6 table__header__column">Ort</div>
            <div class="w-full hidden lg:block lg:w-1/6 table__header__column">Ausgeliehen von</div>
            <div class="w-full hidden lg:block lg:w-1/6 table__header__column"></div>
        </div>
        @foreach($itemEntities as $itemEntity)
        <div class="flex flex-wrap mb-5 lg:mb-0">
            <div class="w-full lg:w-1/6 border-b border-gray-200 bg-white text-sm overflow-hidden">
                <img class="w-full" src="{{ URL::asset('storage/images/' . $itemEntity->displayImage) }}" alt="{{ $itemEntity->itemname }}">
            </div>

            <div class="table__column__header lg:hidden">
                Name
            </div>
            <div class="w-4/6 lg:w-1/6 px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <div class="font-semibold text-gray-700">{{ $itemEntity->identifier }}</div>{{ $itemEntity->item->name }}
            </div>

            <div class="table__column__header lg:hidden">
                Tags
            </div>
            <div class="w-4/6 lg:w-1/6 px-5 pt-5 pb-3 border-b border-gray-200 bg-white text-sm">
                @foreach($itemEntity->tags as $tag)
                    <a href="{{ route('inventory.index', ['tag' => array_merge($selectedTagIds, [$tag->id]), 'location' => $selectedLocationIds]) }}" class="tag">{{ $tag->name }}</a>
                @endforeach
            </div>

            <div class="table__column__header lg:hidden">
                Ort
            </div>
            <div class="w-4/6 lg:w-1/6 px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <a href="{{ route('inventory.index', ['tag' => $selectedTagIds, 'location' => array_merge($selectedLocationIds, [$itemEntity->storagelocation->id])]) }}" class="tag">{{ $itemEntity->storagelocation->name }}</a>
            </div>

            <div class="w-full lg:w-1/6 px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <div class="font-bold block lg:hidden mb-2">Ausgeliehen von</div>
                {{ $itemEntity->borrowed_by ?: '—' }}
            </div>
            <div class="w-full lg:w-1/6 px-5 py-5 border-b border-gray-200 bg-white text-sm text-right">
                <a href="{{ route('items.edit', ['item' => $itemEntity->item->id]) }}" class="btn btn__negative">
                    Update Item
                </a>
                <form action="{{ route('items.destroy', ['item' => $itemEntity->item->id]) }}" method="POST">
                    {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="DELETE"/>
                    <input type="submit" class="btn btn__negative" value="Delete Item"/>
                </form>
                <button class="btn btn__negative">
                    Checkout
                </button>
            </div>
        </div>
        @endforeach
        <div class="table__footer">
            <div class="flex justify-between">
                <div class="table__footer__column">Zurück</div>
                <div class="table__footer__column">2</div>
                <div class="table__footer__column">Weiter</div>
            </div>
        </div>
    </div>
</div>
@endsection
