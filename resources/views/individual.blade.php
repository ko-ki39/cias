@extends('common_view.common')

@section('import')
    {{-- css等の読み込み場所 --}}
    {{-- <link rel="stylesheet" href="/css/comment.css" type="text/css"> --}}
    <link rel="stylesheet" href="/css/individual.css" type="text/css">
@endsection

@section('content')
    <div class="main">
        <div id="main_left">
            <div id="me">
                <img src="/storage/{{ Auth::user()->image }}" alt="">
                &nbsp;&nbsp;&nbsp;
                <h1>{{ $user->user_name }}&nbsp;のマイページ</h1>
            </div>
            @foreach ($articles as $article)
            <div class="article_list">
                <div class="a_l_img">
                    <a href="{{ route('article_detail', ['id' => $article->id]) }}">
                        <img src="/storage/{{ $article->image }}" alt="">
                    </a>
                </div>
                <div class="a_l_details">
                    <div class="a_l_d_link">
                        <a href="{{ route('article_detail', ['id' => $article->id]) }}">
                            {{ $article->title }}
                        </a>
                        <input type="hidden" name="" class="delivery_a_id" value="{{ $article->id }}">
                    </div>
                    <div class="a_l_com-twi-fav">
                        <i class="fas fa-comments fa-2x c_nonActiv" style="color:#9b9b9b;"></i>
                        <i class="fab fa-twitter-square fa-2x" style="color:#1da1f2;"></i>
                        <i class="fab fa-gratipay fa-2x f_nonActiv" style="color:#9b9b9b;"></i>
                    </div>
                </div>
                <div class="a_l_edit">
                    <a href="">編集</a>
                    <a href="">削除</a>
                </div>
            </div>
            @endforeach
        </div>
        <div id="main_right">
            <div id="ajax_commentList">
                <div class="a_c_title">
                    <h2>記事に付いたコメント</h2>
                </div>
            </div>
            <div id="ajax_favList">
                <div class="a_f_title">
                    <h2>お気に入りしてくれた人</h2>
                </div>
                {{-- ここからforeachでやる --}}
            </div>
            <div id="ajax_default">
                <i class="fas fa-comments fa-2x" style="color:#9b9b9b;"></i>
                &nbsp;か&nbsp;
                <i class="fab fa-gratipay fa-2x" style="color:#9b9b9b;"></i>
                &nbsp;を押すと、<br>
                この場所に<br>
                「コメントしてくれた人」<br>
                「お気に入りに入れてくれた人」が<br>
                一覧で表示されます！
            </div>
        </div>
    </div>
    <script src="/js/individualFavCom_ajax.js"></script>

    {{-- <div class="main">
        <div class="me">
            <div class="me_image"></div>
            <p>{{ $user->user_name }}さんのマイページ</p>
        </div>
        <div class="content">
            @foreach ($articles as $article)

                <div class="article">
                    <a href="{{ route('article_detail', ['id' => $article->id]) }}">
                        <img src="/storage/{{ $article->image }}" class="image">
                    </a>
                    <a href="{{ route('article_detail', ['id' => $article->id]) }}">
                        <p class="title">{{ $article->title }}</p>
                    </a>
                    <div class="add">
                        <div class="comment">※</div>
                        <div class="twitter">twi</div>
                        <div class="fav">fa</div>
                    </div>
                    <a href="{{ route('edit', ['id' => $article->id]) }}">
                        編集
                    </a>
                    <a href="{{ route('delete', ['id' => $article->id]) }}">
                        削除
                    </a>
                </div>

            @endforeach
        </div>
        @component('components.comment')

        @endcomponent
    </div> --}}
@endsection
