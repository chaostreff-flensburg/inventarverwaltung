@extends('layout.app')

@section('content')
<div class="mx-10 lg:mx-auto">
    <h1 class="headline">Neues Item</h1>

    <form action="{{ route('itementities.store') }}" method="POST">
        {{csrf_field()}}
        <h2 class="subheadline">Entity</h2>
        <div class="rounded overflow-hidden shadow bg-white mb-10 p-10">
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="identifier">
                        Identifier
                    </label>
                    <input class="form-input @error('identifier') error @enderror" id="identifier" type="text" placeholder="Jane"  name="identifier" value="{{ old('identifier') }}">
                    @error('identifier')
                    <p class="form-error">{{ $message }}</p>
                    @enderror
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
                    <input class="form-input @error('amount') error @enderror" id="amount" type="text" placeholder="Doe" name="amount" value="{{ old('amount') }}">
                    @error('amount')
                    <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="storagelocation">
                        Storagelocation
                    </label>
                    <div class="relative">
                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="storagelocation">
                            @foreach($items as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
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
