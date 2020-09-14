@extends('common_view.common')

@section('import')
{{-- css等の読み込み場所 --}}
<link rel="stylesheet" href="/css/side_bar.css" type="text/css">
<link rel="stylesheet" href="/css/top.css" type="text/css">
@endsection

@section('content')
{{-- この下からbodyの中身を書き始める --}}
<div class="main">
    @component('components.article')
    {{-- 記事一覧表示場所 --}}
    @endcomponent
    <div class="content">
        <div class="article">
            <div class="article_image">
            </div>
            <p class="article_title">タイトル</p>
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
