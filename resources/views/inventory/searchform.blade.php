<div class="lg:flex justify-between">
    <div class="text-gray-700 text-center">
        <form action="{{ route('listItementities') }}" method="GET" role="search">
            {{csrf_field()}}
            @foreach($selectedTagIds as $tag)
                <input type="hidden" name="tag[]" value="{{$tag}}">
            @endforeach
            @foreach($selectedLocationIds as $location)
                <input type="hidden" name="location[]" value="{{$location}}">
            @endforeach

            <div class="search__form">
                <input type="text" value="{{ $search }}" placeholder="Suche..." name="search" class="search__form__input">
                @foreach($selectedTags as $tag)
                    <a href="{{ route('listItementities', ['tag' => array_diff($selectedTagIds, [$tag->id]), 'location' => $selectedLocationIds]) }}" class="tag">
                        {{ $tag->name }}
                        <span class="font-normal">x</span>
                    </a>
                @endforeach
                @foreach($selectedLocations as $location)
                    <a href="{{ route('listItementities', ['location' => array_diff($selectedLocationIds, [$location->id]), 'tag' => $selectedTagIds]) }}" class="tag">
                        {{ $location->name }}
                        <span class="font-normal">x</span>
                    </a>
                @endforeach
            </div>
        </form>
    </div>
    <div class="text-gray-700 text-center mb-10"><button class="btn">Neues Item</button></div>
</div>