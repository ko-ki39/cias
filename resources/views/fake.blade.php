@extends('common_view.common')

@section('import')
    {{-- css等の読み込み場所 --}}
    <link rel="stylesheet" href="/css/side_bar.css" type="text/css">
    <link rel="stylesheet" href="/css/individual.css" type="text/css">
    <link rel="stylesheet" href="/css/fake.css" type="text/css">

@endsection

@section('content')
    {{-- この下からbodyの中身を書き始める --}}
    <div class="main">
        <div class="me">
            <div class="me_image"></div>
            <p>--------さんが投稿した記事</p>
        </div>
        <div class="content">
            <div class="article">
                <a href="article_detail">
                    <div class="image"></div>
                </a>
                <div class="text">
                    <a href="article_detail">
                        <h3>C#でサイコロを作る方法3選！！！</h3>
                    </a>
                    <p class="detail">みなさん、こんにちは、hogeです！本日はUnityでさいころを実装するにはどうしたらいいか？そういった悩みを解決する方法を3つほど紹介します！まずは...</p>
                    <p class="date">2020/00/00</p>
                </div>
                <div class="add">
                    <div class="comment"></div>
                    <div class="twitter"></div>
                    <div class="fav"></div>
                </div>
            </div>
            <div class="article">
                <div class="image"></div>
                <div class="text">
                    <h3>C#でサイコロを作る方法3選！！！</h3>
                    <p class="detail">みなさん、こんにちは、hogeです！本日はUnityでさいころを実装するにはどうしたらいいか？そういった悩みを解決する方法を3つほど紹介します！まずは...</p>
                    <p class="date">2020/00/00</p>
                </div>
                <div class="add">
                    <div class="comment"></div>
                    <div class="twitter"></div>
                    <div class="fav"></div>
                </div>
            </div>
        </div>
        @component('components.side-bar')
            {{-- ここはサイドバーです --}}
        @endcomponent
    </div>
@endsection
