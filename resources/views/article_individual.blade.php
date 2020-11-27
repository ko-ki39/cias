@extends('common_view.common')

@section('import')
    {{-- css等の読み込み場所 --}}

    <link rel="stylesheet" href="/css/article_individual.css" type="text/css">
@endsection

@include('common_view.header', ['title' => 'コメントがついた記事等を見る'])

@section('content')
    {{-- この下からbodyの中身を書き始める --}}

    <div class="main">
        <div id="me">
            <img src="/storage/{{ Auth::user()->image }}" alt="">
            <h2>{{ Auth::user()->user_name }}<br><span>のマイページ</span></h2>
        </div>
        <div class="choice">
            <p id="fav_button">お気に入りした記事</p>
            <p id="comment_button">コメントした記事</p>
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


        //ページ読み込み時に、article_listのアスペクト比を整える
        let article_list = document.getElementsByClassName("article_list");
        let www = article_list[0].getBoundingClientRect().width;

        function article_listAspect(){
            for(let i=0; i<article_list.length; i++){
                article_list[i].style.height = www;
                console.log(www);
            }
        }

        window.onload = article_listAspect();
        window.onresize = article_listAspect();

        // window.addEventListener("resize", article_listAspect);
    </script>
@endsection
