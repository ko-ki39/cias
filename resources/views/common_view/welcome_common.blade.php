<!DOCTYPE HTML>
<html lang="ja">

    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
        <title>訓練校キャリア情報</title>
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/welcome.css">
        <link rel="stylesheet" href="/css/hamburger.css">
        <script src="/js/fontawesome0853445863.js" crossorigin="anonymous"></script>
        <script src="/js/jquery-3.5.1.min.js"></script>
        <script src="/js/ztext.min.js"></script>
        {{-- <script src="{{ asset('/js/jquery-3.5.1.min.js') }}"></script> --}}
        {{-- <link rel="stylesheet" href="/css/welcome.css" type="text/css">
        <link rel="stylesheet" href="/css/hamburger.css" type="text/css"> --}}
    </head>

    <body>
        @guest
        <div class="welcome_header">
        </div>
        @else
        <div class="welcome_header">
            <a href="{{ route('individual', ['id' => Auth::id()]) }}">{{ Auth::user()->user_name }}</a>
            <a href="{{ route('individual', ['id' => Auth::id()]) }}"><img src="/storage/{{ Auth::user()->image }}" alt="{{ Auth::user()->image }}"></a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
        @endguest
        <x-hamburger />
        @yield('content')
        @include('common_view.footer')
        <div id="quietflowOnBody"></div>
        <script src="/js/hamburgerWelcome.js"></script>
        <script src="/js/ztextPlay.js"></script>
        <script src="/js/quietflow.min.js"></script>
        <script src="/js/welcome_quietflow.js"></script>
    </body>

</html>
