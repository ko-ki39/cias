@extends('common_view.welcome_common')

@section('content')
    <section id="welcome_section">
        <div class="header_band"></div>
        <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
        <div id='stars'></div>
        <div id='stars2'></div>
        <div id='stars3'></div>
        <div class="welcome_image">
            <p>Welcome to Abyss.<p>
        </div>
        <div>
            <img src="" alt="">
            <p>訓練生による訓練生のためのサイトです！！<br>
            訓練生が取り組んでいることや、<br>
            アピールしたいことなどを、透明化してやるぞ</p>
        </div>
        <div id="main">
            <div><a href="#">ポートフォリオ集</a></div>
            <div><a href="#">自作ゲエム</a></div>
            <div><a href="/top">ブログのようなもの</a></div>
        </div>
    </section>
@endsection