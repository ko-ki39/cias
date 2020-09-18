<!DOCTYPE HTML>
<html lang="ja">

    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>とどめの野菜ジュースを喰らいな</title>
        <link href="{{ asset('/css/welcome.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/hamburger.css') }}" rel="stylesheet">
        <script src="{{ asset('/js/jquery-3.5.1.min.js') }}"></script>
        {{-- <link rel="stylesheet" href="/css/welcome.css" type="text/css">
        <link rel="stylesheet" href="/css/hamburger.css" type="text/css"> --}}
    </head>

    <body>
        @include('components.hamburger')
        @yield('content')
        @include('common_view.footer')
        <script src="{{ asset('/js/quietflow.js') }}"></script>
        <script src="{{ asset('/js/hamburger.js') }}"></script>
        <script src="{{ asset('/js/backgroundAnimation.js') }}"></script>
    </body>

</html>
