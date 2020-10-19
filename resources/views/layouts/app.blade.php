<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.head')
<body>
    <header class="header">
        <a href="{{ route('inventory.search') }}" class="logo">@lang('views/app.title')</a>
        <a href="{{ route('item.create') }}">@lang('views/app.item')</a>
        <a href="{{ route('itementity.create') }}">@lang('views/app.itementity')</a>
        <a href="{{ route('storagelocation.create') }}">@lang('views/app.storagelocation')</a>
    </header>
    <div id="app">
        @yield('content')
    </div>
    @include('layouts.footer')
</body>
</html>
