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
            <div id="fav_button">
                お気に入りした記事
            </div>
            <div id="comment_button">
                コメントした記事
            </div>
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
    <div id="pop_background"></div>
    <div id="main_modal"></div>
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
        let wwwAFTER;
        let wwwFLAG = 0;

        function article_listAspect(){
            switch(wwwFLAG){
                case 0:
                    for(let i=0; i<article_list.length; i++){
                        article_list[i].style.height = www;
                    }
                    wwwFLAG = 1;
                    break;
                case 1:
                    wwwAFTER = article_list[0].clientWidth;
                    for(let i=0; i<article_list.length; i++){
                        article_list[i].style.height = wwwAFTER;
                    }
                    break;
            }
            console.log(`width=${wwwAFTER}`, "resized!!!", `height=${article_list[0].style.height}`);
        }

        window.onload = article_listAspect();
        // window.onresize = article_listAspect();
        // window.addEventListener("resize", article_listAspect);
        window.addEventListener("resize", article_listAspect, true);



        let choice = document.getElementsByClassName("choice")[0];

        function choiceButtonSwitch(e){
            console.log(e.target.id);
            if(e.target.id === "fav_button"){
                comment_button.style.backgroundColor = "#c7c7c7";
                fav_button.style.backgroundColor = "#f8f8f8";
            }else{
                comment_button.style.backgroundColor = "#f8f8f8";
                fav_button.style.backgroundColor = "#c7c7c7";
            }
        }

        // c_favs.addEventListener("click", choiceButtonSwitch, true);
        // c_comments.addEventListener("click", choiceButtonSwitch, true);
        choice.addEventListener("click", function(e){choiceButtonSwitch(e)}, true);
    </script>
@endsection
