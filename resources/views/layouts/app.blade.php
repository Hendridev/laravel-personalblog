<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet"> 
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        {{-- title --}}
        <title>@yield('title', 'Hendriblog')</title>
        @yield('header')
    </head>
    <body >
        @include('layouts/navigation')
        @include('alert')
        <main class="py-4">
            @yield('body')
        </main>
    </body>
    @yield('script')
</html>
