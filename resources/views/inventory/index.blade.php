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
                Ausgeliehen von
            </div>
            <div class="w-full lg:w-1/5 px-5 py-5 border-b border-gray-200 bg-white text-sm">
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
@endsection
