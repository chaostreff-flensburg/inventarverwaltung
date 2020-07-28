<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layout.head')
<body>
    <div id="app">
        <main class="py-3">
            @yield('content')
        </main>
    </div>
    @include('layout.footer')
</body>
</html>
