<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>タイトル</title>
        {{-- css,js等インポート --}}
        <link rel="stylesheet" href="/css/style.css" type="text/css">
        {{-- <link href="{{ asset('/css/hamburger.css') }}" rel="stylesheet"> --}}
        <link rel="stylesheet" href="/css/hamburger.css" type="text/css">
        @yield('import')
        {{-- <link href="/css/fontawesome_v561.css" rel="stylesheet"> --}}
        <script src="/js/fontawesome0853445863.js" crossorigin="anonymous"></script>
        <script src="/js/jquery-3.5.1.min.js"></script>
    </head>
    <body>
        @include('components.hamburger')
        @include('common_view.header')
        @yield('content')
        @include('common_view.footer')
        <script src="/js/hamburger.js"></script>
        <script src="/js/fav.js"></script>
    </body>
</html>
