<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'Sample App')</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="/css/app.css" type="text/css">
        <!-- Styles -->
    </head>
    <body>
        @include('layouts._header')

        <div class="container">
             @include('shared._messages')
             @yield('content')
             @include('layouts._footer')
        </div>

        <script src="/js/app.js"></script>
    </body>
</html>
