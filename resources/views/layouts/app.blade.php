<!-- Основной шаблон приложения -->
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
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-light">
    <div id="app">
        @include('blocks.navbars.login')
        <div class="container bg-light pt-5">
            @yield('header')
            <main class="py-4">
                @yield('content')
            </main>

            @yield('footer')
        </div>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
