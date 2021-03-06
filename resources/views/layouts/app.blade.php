<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Qvote') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @include('includes.css')

</head>
<body>
<div id="app">
    @include('includes.header')
    <div class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid">
        <div class="clearfix"></div>
        <div class="page-container">
            @if(\Illuminate\Support\Facades\Auth::user())
                @include('includes.sidebar')
            @endif
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </div>
    @include('includes.js')

</div>
</body>
</html>
