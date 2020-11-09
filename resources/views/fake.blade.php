@extends('common_view.common')

@section('import')
    {{-- css等の読み込み場所 --}}
    <link rel="stylesheet" href="/css/side_bar.css" type="text/css">
    <link rel="stylesheet" href="/css/individual.css" type="text/css">
    <link rel="stylesheet" href="/css/fake.css" type="text/css">

@endsection
@include('common_view.header', ['title' => '他人のページ'])

@section('content')
    {{-- この下からbodyの中身を書き始める --}}
    <div class="main">
        <div class="content">
            <div class="me">
                <img src="/storage/{{ $user->image }}" alt="" class="me_image">
                <p>{{ $user->user_name }}さんが投稿した記事</p>
            </div>
            @foreach ($articles as $article)

                <div class="article">
                    <input type="hidden" name="article-id" value="{{ $article->id }}" class="article_ajax_id">
                    <div id="fake_left">
                        <a href="{{ route('article_detail', ['id' => $article->id]) }}">
                            <img src="/storage/{{ $article->image }}" class="image">
                        </a>
                    </div>
                    <div id="fake_right">
                        <div class="title_text">
                            <a href="{{ route('article_detail', ['id' => $article->id]) }}">
                                <h3>{{ $article->title }}</h3>
                            </a>
                        </div>
                        <div class="desc_text">
                            {{-- <p class="detail">{{ $article->description }}</p> --}}
                            <p class="detail">あああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああ...</p>
                        </div>
                        <div class="ctf_container">
                            <p class="date">1919 / 8 / 10 (Fry)</p>
                            <div class="comment"><i class="far fa-comment fa-2x" style="color:#135f13;"></i></div>
                            {{-- <div><a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-hashtags="{{ $article->hash1_id }}" data-lang="en" data-show-count="false" data-url="{{ route('article_detail', ['id' => $article->id]) }}" data-text="{{ $article->title }}"></a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script></div> --}}
                            <div class="twitter"><a href="http://twitter.com/share?text={{ $article->title }}&url={{ route('article_detail', ['id' => $article->id]) }}&hashtags={{ $article->hash1_id }}" rel="nofollow" target="_blank" rel="noopener noreferrer"><i class="fab fa-twitter-square fa-2x" style="color:#1da1f2;"></i></a></div>
                            {{-- {{ dd(Illuminate\Support\Facades\DB::table("favs")->where("article_id", "=", $article->id)->where("user_id", "=", Auth::id())->first()) }} --}}
                            @if (Illuminate\Support\Facades\DB::table("favs")
                                    ->where("article_id", "=", $article->id)
                                    ->where("user_id", "=", Auth::id())->exists() != null)
                                <div class="fav">
                                    <i id="" class="heart-button-l fa-heart fa-2x fas" style="color:#ff0000;"></i>
                                </div>
                            @else
                                <div class="fav">
                                    <i id="" class="heart-button-l fa-heart fa-2x far" style="color:#ff0000;"></i>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
        {{-- @component('components.side-bar') --}}
            {{-- ここはサイドバーです --}}
            <x-side_bar /> {{-- SideBar.phpコンポーネントを通して作成 --}}

        {{-- @endcomponent --}}
    </div>
@endsection
