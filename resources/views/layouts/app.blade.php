<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.head')
<body>
    <header class="header">
        <a href="{{ route('inventory.search') }}" class="logo">Inventory System</a>
        <a href="{{ route('item.index') }}">Items</a>
        <a href="{{ route('itementity.index') }}">Item Entities</a>
        <a href="{{ route('storagelocation.index') }}">Storage Locations</a>
    </header>
    <div id="app">
        @yield('content')
    </div>
    @include('layouts.footer')
</body>
</html>
