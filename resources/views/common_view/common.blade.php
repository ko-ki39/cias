<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>タイトル</title>
        {{-- css,js等インポート --}}
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css" rel="stylesheet">
    </head>
<body>
    @include('common_view.header')
    @yield('content')
</body>
</html>
