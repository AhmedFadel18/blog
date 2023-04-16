<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <link href="{{ asset ('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset ('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset ('assets/css/templatemo-stand-blog.css') }}">
    <link rel="stylesheet" href="{{ asset ('assets/css/owl.css') }}">
</head>
<body>
        @include('home.layouts.includes.header')
    </div><br><br><br><br><br><br>
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset ('assets/js/app.js') }}"></script>
</body>
</html>
