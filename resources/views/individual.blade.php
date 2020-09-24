@extends('common_view.common')

@section('import')
    {{-- css等の読み込み場所 --}}
    <link rel="stylesheet" href="/css/comment.css" type="text/css">
    <link rel="stylesheet" href="/css/individual.css" type="text/css">
@endsection

@section('content')
    {{-- この下からbodyの中身を書き始める --}}
    <div class="main">
        <div class="me">
            <div class="me_image"></div>
            {{-- {{ dd($user) }} --}}
            <p>{{ $user->user_name }}さんのマイページ</p>
        </div>
        <div class="content">
            @foreach ($articles as $article)

                <div class="article">
                    <a href="{{ route('article_detail', ['id' => $article->id]) }}">
                        <div class="image"></div>
                    </a>
                    <a href="{{ route('article_detail', ['id' => $article->id]) }}">
                        <p class="title">{{ $article->title }}</p>
                    </a>
                    <div class="add">
                        <div class="comment">※</div>
                        <div class="twitter">twi</div>
                        <div class="fav">fa</div>
                    </div>
                </div>

            @endforeach
        </div>
        @component('components.comment')
            {{-- ここはサイドバーです --}}
        @endcomponent
    </div>
@endsection
