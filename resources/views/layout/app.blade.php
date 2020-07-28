<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layout.head')
<body class="bg-gray-200">
    <div id="app" class="lg:container mx-auto mt-20">
        @yield('content')
    </div>
    @include('layout.footer')
</body>
</html>
