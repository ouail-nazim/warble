<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>warble</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="shortcut icon" href="/images/hh.png" type="image/x-icon"/>
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    <link href="/fontawesome/css/all.css" rel="stylesheet">
</head>
<body>
<div id="app">
    <section class="px-8 py-2 ">
        <header class="container mx-auto flex justify-between ">
            <h3>
                <a href="/"><img src="/images/logo.png" alt="warble" width="100px" ></a>
            </h3>
            <x-nav></x-nav>

        </header>
    </section>

   {{$slot}}


</div>
    <script src="http://unpkg.com/turbolinks"></script>
    <script src="{{ asset('js/js.js') }}" defer></script>
</body>
</html>
