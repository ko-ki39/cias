@extends('common_view.common')

@section('import')
    {{-- css等の読み込み場所 --}}
    <link rel="stylesheet" href="/css/side_bar.css" type="text/css">
    <link rel="stylesheet" href="/css/article_detail.css" type="text/css">
@endsection

@section('content')
    {{-- この下からbodyの中身を書き始める --}}
    <div class="main">
        <div class="article">
            <div class="sub">
                <div class="user">
                    <div class="image"></div>
                    <a href="{{ route('individual', ['id' => $user->id]) }}">
                        <p>{{ $user->user_name }}</p>
                    </a>
                </div>
                <h3 class="title">{{ $article->title }}</h3>
                <div class="article_info">
                    <p class="date">{{ $article->created_at }}</p>
                    <div class="add">
                        <div class="comment"></div>
                        <div class="twitter"></div>
                        <div class="fav"></div>
                    </div>
                    <p class="hash">{{ $article->hash1_id }}</p>
                    <p class="hash">{{ $article->hash1_id }}</p>
                    <p class="hash">{{ $article->hash1_id }}</p>
                </div>
            </div>
            <div class="text">
                <div class="big_image"></div>
                <p>詳細 ゾウリムシ リサイクル アクセント レインコート 体温計 人魚姫 椅子取りゲーム 留守番電話 エスカレーター 暑中見舞い ゲームデザイナー 海老で鯛を釣る 驚愕の事実 懐中電灯 映画館で昼食
                    ピーマンも食べなさい</p>
            </div>
        </div>
        @component('components.side-bar')
            {{-- ここはサイドバーです --}}
        @endcomponent
    </div>
@endsection
