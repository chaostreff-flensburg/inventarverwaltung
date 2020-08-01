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
                    <a href="{{ route('listItementities', ['tag' => array_merge($selectedTagIds, [$tag->id]), 'location' => $selectedLocationIds]) }}" class="tag">{{ $tag->name }}</a>
                @endforeach
            </div>

            <div class="table__column__header lg:hidden">
                Ort
            </div>
            <div class="w-4/6 lg:w-1/6 px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <a href="{{ route('listItementities', ['tag' => $selectedTagIds, 'location' => array_merge($selectedLocationIds, [$itemEntity->storagelocation->id])]) }}" class="tag">{{ $itemEntity->storagelocation->name }}</a>
            </div>

            <div class="w-full lg:w-1/6 px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <div class="font-bold block lg:hidden mb-2">Ausgeliehen von</div>
                {{ $itemEntity->borrowed_by ?: '—' }}
            </div>
            <div class="w-full lg:w-1/6 px-5 py-5 border-b border-gray-200 bg-white text-sm text-right">
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

<div class="mx-10 lg:mx-auto">
    <form>
        <h2 class="subheadline">Item</h2>
        <div class="rounded overflow-hidden shadow bg-white mb-10 p-10">
            <div class="flex flex-wrap -mx-3 mb-6 w-full max-w-lg">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Title
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Jane">
                    <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                        Description
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Doe">
                </div>
            </div>
        </div>

        <h2 class="subheadline">Entity</h2>
        <div class="rounded overflow-hidden shadow bg-white mb-10 p-10">
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="identifier">
                        Identifier
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="identifier" type="text" placeholder="Jane">
                    <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="consumable">
                        Is Consumable
                    </label>
                    <label class="md:w-2/3 block text-gray-500 font-bold">
                        <input class="mr-2 leading-tight" type="checkbox">
                        <span class="text-sm">
                            Yes
                        </span>
                    </label>
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="amount">
                        Amount
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="amount" type="text" placeholder="Doe">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="storagelocation">
                        Storagelocation
                    </label>
                    <div class="relative">
                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="storagelocation">
                            <option>New Mexico</option>
                            <option>Missouri</option>
                            <option>Texas</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn">Anlegen</button>
    </form>
</div>
@endsection
