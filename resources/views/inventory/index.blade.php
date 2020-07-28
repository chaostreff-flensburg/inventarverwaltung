@extends('layout.app')

@section('content')
<h1 class="text-2xl mb-8 text-gray-600">Inventarverwaltung</h1>
<div class="flex justify-between">
    <div class="text-gray-700 text-center"><input type="text" placeholder="Suche..." class="border border-transparent shadow px-4 py-2 mb-10 leading-normal text-gray-700 bg-white rounded-md" ></div>
    <div class="text-gray-700 text-center"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Neues Item</button></div>
</div>
<div class="rounded overflow-hidden shadow bg-white mb-20">
    <table class="w-full">
        <thead>
            <tr>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Name</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Beschreibung</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Ort</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Ausgeliehen von</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
            <tr>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $item->item->name }}</td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $item->item->name }}</td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm"><span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2"></span></td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                    Checkout
                </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
        <div class="flex justify-between">
            <div class="text-gray-700 text-center px-4 py-2 m-2">Zurück</div>
            <div class="text-gray-700 text-center px-4 py-2 m-2">2</div>
            <div class="text-gray-700 text-center px-4 py-2 m-2">Weiter</div>
        </div>
    </div>
</div>
@endsection
