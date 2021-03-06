@extends('common_view.common')

@section('import')
    {{-- css等の読み込み場所 --}}
    {{--
    <link rel="stylesheet" href="/css/comment.css" type="text/css"> --}}
    <link rel="stylesheet" href="/css/individual.css" type="text/css">
@endsection

@section('title', 'マイページ')

@section('content')
    <div id="me">
        <img src="/storage/{{ Auth::user()->image }}" alt="">
        <h2>{{ $user->user_name }}<br><span>のマイページ</span></h2>
    </div>
    <div id="myComFav_link">
        <a href="{{ route('fav_page') }}">&gt;&nbsp;コメント、お気に入りした記事の一覧</a>
    </div>
    <div class="main">
        <div id="main_left">
            @foreach ($articles as $article)
            <div id="superArticles">
                <div class="article_edit">
                    <p>{{ $article->article_at() }}&nbsp;に作成しました</p>
                    <div>
                        <a href="{{ route('edit', $article->id) }}"><i class="fas fa-pencil-alt fa"></i></a>|<a href="{{ route('delete', $article->id) }}"><i class="fas fa-trash-alt fa"></i></a>
                    </div>
                </div>
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
                        <div class="a_l_com-twi-fav" style="font-size: 1.6rem;">
                            <i class="fas fa-comments fa c_nonActiv" style="color:#9b9b9b;"></i>
                            <i class="fab fa-twitter-square fa" style="color:#1da1f2;"></i>
                            <i class="fab fa-gratipay fa f_nonActiv" style="color:#9b9b9b;"></i>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            {{ $articles->links() }}
        </div>
        <div id="pop_background"></div>
        <div id="main_right">
            {{-- <div class="batu_button">
                <div>
                    <p>×</p>
                </div>
            </div> --}}
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
