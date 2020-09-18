@extends('common_view.common')

@section('import')
    {{-- css等の読み込み場所 --}}
    <link rel="stylesheet" href="/css/side_bar.css" type="text/css">
    <link rel="stylesheet" href="/css/top.css" type="text/css">
@endsection

@section('content')
    {{-- この下からbodyの中身を書き始める --}}
    <div class="main">
        <div class="content">
            <form action="/" method="post">
                <div class="search">
                    <i class="fas fa-search"></i>
                    <input type="text" name="search">
                    <input type="submit" value="検索">
                </div>
            </form>
            <div class="article">
                <a href="article_detail">
                    <div class="article_image">
                        <a href="fake">
                            <p>作者名</p>
                        </a>
                    </div>
                </a>
                <a href="article_detail">
                    <p class="article_title">タイトル</p>
                </a>

                <p class="article_description">詳細00000000000000000000000000000000000000</p>
                <p class="date">2020/00/00</p>
                <div class="comment">
                </div>
                <div class="twitter"></div>
                <div class="fav"></div>
            </div>
            <div class="article">
                <div class="article_image">
                </div>
                <p class="article_title">タイトル</p>
                <p class="article_description">詳細</p>
                <p class="date">2020/00/00</p>
                <div class="comment">
                </div>
                <div class="twitter"></div>
                <div class="fav"></div>
            </div>
        </div>
        @component('components.side-bar')
            {{-- ここはサイドバーです --}}
        @endcomponent
    </div>
@endsection
