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
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/0853445863.js" crossorigin="anonymous"></script>
    </head>
    <body>
        @include('components.hamburger')
        @include('common_view.header')
        @yield('content')
        @include('common_view.footer')
        <script src="/js/hamburger.js"></script>
    </body>
</html>
