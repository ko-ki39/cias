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
            <p>{{ $user->user_name }}さんが投稿した記事</p>
        </div>
        <div class="content">
            @foreach ($articles as $article)

                <div class="article">
                    <a href="{{ route('article_detail', ['id' => $article->id]) }}">
                        <img src="/storage/{{ $article->image }}" class="image">
                    </a>
                    <div class="text">
                        <a href="{{ route('article_detail', ['id' => $article->id]) }}">
                            <h3>{{ $article->title }}</h3>
                        </a>
                        <p class="detail">{{ $article->description }}</p>
                        <p class="date">2020/00/00</p>
                    </div>
                    <div class="add">
                        <div class="comment"></div>
                        <div class="twitter"></div>
                        <div class="fav"></div>
                    </div>
                </div>

            @endforeach
        </div>
        @component('components.side-bar')
            {{-- ここはサイドバーです --}}
        @endcomponent
    </div>
@endsection
