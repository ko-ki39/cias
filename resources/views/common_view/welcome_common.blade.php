<!DOCTYPE HTML>
<html lang="ja">

    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>とどめの野菜ジュースを喰らいな</title>
        <link href="{{ asset('/css/welcome.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/hamburger.css') }}" rel="stylesheet">
        {{-- <link rel="stylesheet" href="/css/welcome.css" type="text/css">
        <link rel="stylesheet" href="/css/hamburger.css" type="text/css"> --}}
    </head>

    <body>
        @include('components.hamburger')
        @yield('content')
        @include('common_view.footer')
        <script src="/js/hamburger.js"></script>
    </body>

</html>
