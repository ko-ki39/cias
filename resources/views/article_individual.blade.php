@extends('common_view.common')

@section('import')
    {{-- css等の読み込み場所 --}}

    <link rel="stylesheet" href="/css/article_individual.css" type="text/css">
@endsection

@section('content')
    {{-- この下からbodyの中身を書き始める --}}

    <div class="main">
        <div class="me">
            <div class="me_image"></div>
            {{-- {{ dd($user) }} --}}
            <p>さんのマイページ</p>
        </div>
        <div class="choice">
            <p>コメントした記事</p>
            <p>お気に入りした記事</p>
        </div>
        <div class="article">
            <x-fav-article/>
            {{-- <x-comment-article/> --}}
        </div>
    </div>
    <div class="tippy_template" style="display:none;">
        この記事を、マイページに保存する！
    </div>
    <div class="tippy_template" style="display:none;">
        この記事を、Twitterに晒す！
    </div>
    <div class="tippy_template" style="display:none;">
        この記事に、コメントを書く！
    </div>
@endsection
