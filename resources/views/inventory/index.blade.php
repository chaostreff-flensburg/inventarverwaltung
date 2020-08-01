@extends('layout.app')

@section('content')
<div class="mx-10 lg:mx-auto">
    <h1 class="text-2xl mb-8 text-gray-600">Inventarverwaltung</h1>
    <div class="flex justify-between">
        <div class="text-gray-700 text-center"><input type="text" placeholder="Suche..." class="border border-transparent shadow px-4 py-2 mb-10 leading-normal text-gray-700 bg-white rounded-md" ></div>
        <div class="text-gray-700 text-center"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Neues Item</button></div>
    </div>
    <div class="rounded overflow-hidden lg:shadow lg:bg-white mb-20">
        <div class="flex flex-wrap">
            <div class="w-full hidden lg:block lg:w-1/5 px-5 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Name</div>
            <div class="w-full hidden lg:block lg:w-1/5 px-5 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Tags</div>
            <div class="w-full hidden lg:block lg:w-1/5 px-5 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Ort</div>
            <div class="w-full hidden lg:block lg:w-1/5 px-5 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Ausgeliehen von</div>
            <div class="w-full hidden lg:block lg:w-1/5 px-5 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"></div>
        </div>
        @foreach($items as $item)
        <div class="flex flex-wrap mb-5 lg:mb-0">
            <div class="w-1/5 px-5 py-5 border-b border-gray-200 bg-white text-sm lg:hidden font-bold">
                Name
            </div>
            <div class="w-4/5 lg:w-1/5 px-5 py-5 border-b border-gray-200 bg-white text-sm">
                {{ $item->itemname }}<br />{{ $item->identifier }}
            </div>

            <div class="w-1/5 px-5 py-5 border-b border-gray-200 bg-white text-sm lg:hidden font-bold">
                Tags
            </div>
            <div class="w-4/5 lg:w-1/5 px-5 py-5 border-b border-gray-200 bg-white text-sm">
                @foreach($item->tags as $tag)
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">{{ $tag->name }}</span>
                @endforeach
            </div>

            <div class="w-1/5 px-5 py-5 border-b border-gray-200 bg-white text-sm lg:hidden font-bold">
                Ort
            </div>
            <div class="w-4/5 lg:w-1/5 px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">{{ $item->storagename }}</span>
            </div>

            <div class="w-full lg:w-1/5 px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <div class="font-bold block lg:hidden mb-2">Ausgeliehen von</div>
                {{ $item->borrowed_by }}
            </div>
            <div class="w-full lg:w-1/5 px-5 py-5 border-b border-gray-200 bg-white text-sm text-right">
                <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                    Checkout
                </button>
            </div>
        </div>
        @endforeach
        <div class="border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
            <div class="flex justify-between">
                <div class="text-gray-700 text-center px-4 py-2 m-2">Zurück</div>
                <div class="text-gray-700 text-center px-4 py-2 m-2">2</div>
                <div class="text-gray-700 text-center px-4 py-2 m-2">Weiter</div>
            </div>
        </div>
    </div>
</div>

<div class="mx-10 lg:mx-auto">
    <form>
        <h2 class="text-lg mb-6 text-gray-600">Item</h2>
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

        <h2 class="text-lg mb-6 text-gray-600">Entity</h2>
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
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-20">Anlegen</button>
    </form>
</div>
@endsection
