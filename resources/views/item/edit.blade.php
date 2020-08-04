@extends('layout.app')

@section('content')
<div class="mx-10 lg:mx-auto">
    <h1 class="headline">Neues Item</h1>

    <form action="{{ route('items.store') }}" method="POST">
        {{csrf_field()}}
        <h2 class="subheadline">Item</h2>
        <div class="rounded overflow-hidden shadow bg-white mb-10 p-10">
            <div class="flex flex-wrap -mx-3 mb-6 w-full max-w-lg">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                        Title
                    </label>
                    <input class="form-input @error('name') error @enderror" id="name" name="name" type="text" placeholder="Laptop" value="{{ old('name') }}">
                    @error('name')
                    <p class="form-error">{{ $message }}</p>
                    @enderror

                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="description">
                        Description
                    </label>
                    <input class="form-input @error('description') error @enderror" id="description" name="description" type="text" placeholder="Doe" value="{{ old('description') }}">
                    @error('description')
                    <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
        <button class="btn">Anlegen</button>
    </form>
</div>
@endsection
