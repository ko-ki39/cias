<!DOCTYPE HTML>
<html lang="ja">

    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>とどめの野菜ジュースを喰らいな</title>
        <link rel="stylesheet" href="welcome.css">
    </head>

    <body>
        @yield('content')
        @include('common_view.footer')
    </body>

</html>
