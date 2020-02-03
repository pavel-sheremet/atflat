<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', __('main.title'))</title>
    <meta name="description" content="@yield('description', __('main.description'))">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('storage/img/favicon.png') }}"/>
</head>
<body class="main-dark-purple-bgd">
<div id="app">
    @include('layouts.default.nav')
    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
<script src="{{ asset('js/manifest.js') }}" defer></script>
<script src="{{ asset('js/vendor.js') }}" defer></script>
<script src="{{ asset('js/app.js') }}" defer></script>
</html>
