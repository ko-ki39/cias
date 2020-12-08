@extends('common_view.common')

@section('import')
    {{-- css等の読み込み場所 --}}

    <link rel="stylesheet" href="/css/article_individual.css" type="text/css">
@endsection

@section('title', 'コメントをした記事等')

@section('content')
    {{-- この下からbodyの中身を書き始める --}}

    <div class="main">
        <div class="me">
            <div class="me_image"></div>
            {{-- {{ dd($user) }} --}}
            <p>さんのマイページ</p>
        </div>
        <div class="choice">
            <p id="comment_button">コメントした記事</p>
            <p id="fav_button">お気に入りした記事</p>
        </div>
        <div class="article">
            <div id="fav_article">
                <x-fav-article />
            </div>
            <div id="comment_article">
                <x-comment-article />
            </div>
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
    <script>
        'use strict';

        let fav_article = document.getElementById('fav_article');
        let comment_article = document.getElementById('comment_article');

        //↓ボタン
        let comment_button = document.getElementById('comment_button');
        let fav_button = document.getElementById('fav_button');

        comment_button.addEventListener('click', function(){
            fav_article.style.display = 'none';
            comment_article.style.display = 'flex';
        }, false);

        fav_button.addEventListener('click', function(){
            fav_article.style.display = 'flex';
            comment_article.style.display = 'none';
        }, false);




    </script>
@endsection
