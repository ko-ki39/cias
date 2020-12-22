<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
        {{-- <title>タイトル</title> --}}
        <title>@yield('title')</title>
        {{-- css,js等インポート --}}
        <link rel="stylesheet" href="/css/style.css" type="text/css">
        {{-- <link href="{{ asset('/css/hamburger.css') }}" rel="stylesheet"> --}}
        <link rel="stylesheet" href="/css/hamburger.css" type="text/css">
        <link rel="stylesheet" href="/css/css_tippy/shift-toward-extreme.css">
        {{-- <link href="/css/fontawesome_v561.css" rel="stylesheet"> --}}
        <script src="/js/fontawesome0853445863.js" crossorigin="anonymous"></script>
        <script src="/js/jquery-3.5.1.min.js"></script>
        <script src="/js/ztext.min.js"></script>
        <script src="/js/popper.min.js"></script>
        <script src="/js/tippy-bundle.umd.js"></script>
        <script src="/js/confirm.js"></script>
        @yield('import')
        {{-- <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script> --}}
    </head>
    <body>
        {{-- <x-hamburger /> --}}
        @include('common_view.header')

        @yield('content')
        @include('common_view.footer')
        <script src="/js/hamburger.js"></script>
        <script src="/js/ztextPlay.js"></script>
        <script src="{{ asset('/js/quietflow.min.js') }}"></script>
        <script src="{{ asset('/js/common_quietflow.js') }}"></script>
    </body>
</html>
