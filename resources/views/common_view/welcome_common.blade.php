<!DOCTYPE HTML>
<html lang="ja">

    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
        <title>とどめの野菜ジュースを喰らいな</title>
        <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/welcome.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/hamburger.css') }}" rel="stylesheet">
        <script src="/js/fontawesome0853445863.js" crossorigin="anonymous"></script>
        <script src="/js/ztext.min.js"></script>
        {{-- <script src="{{ asset('/js/jquery-3.5.1.min.js') }}"></script> --}}
        {{-- <link rel="stylesheet" href="/css/welcome.css" type="text/css">
        <link rel="stylesheet" href="/css/hamburger.css" type="text/css"> --}}
    </head>

    <body style="background-color:black;">
        @guest
        <p class="ztext ztext-head">具志川<br>訓練校</p>
        @else
        <div class="welcome_header">
            <p class="ztext ztext-head" style="">具志川<br>訓練校</p>
            <a href="{{ route('individual', ['id' => Auth::id()]) }}">{{ Auth::user()->user_name }}</a>
            <a href="{{ route('individual', ['id' => Auth::id()]) }}"><img src="/storage/{{ Auth::user()->image }}" alt="{{ Auth::user()->image }}"></a>
        </div>
        @endguest
        <x-hamburger />
        @yield('content')
        @include('common_view.footer')
        <script src="{{ asset('/js/hamburgerWelcome.js') }}"></script>
        <script src="/js/ztextPlay.js"></script>
        {{-- <script src="{{ asset('/js/quietflow.js') }}"></script> --}}
        {{-- <script src="{{ asset('/js/backgroundAnimation.js') }}"></script> --}}
    </body>

</html>
