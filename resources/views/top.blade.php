@extends('common_view.common')

@section('import')
    {{-- css等の読み込み場所 --}}
    <link rel="stylesheet" href="/css/side_bar.css" type="text/css">
    <link rel="stylesheet" href="/css/top.css" type="text/css">
    <script src=""></script>
@endsection

@section('content')
    {{-- この下からbodyの中身を書き始める --}}
    <div class="main">
        <div class="content">
            <form action="/" method="post">
                <div class="search">
                    <i class="fas fa-search"></i>
                    <input type="text" name="search">
                    <input type="submit" value="検索">
                </div>
            </form>
            @foreach ($articles as $article)

                <div class="article">
                    <input type="hidden" name="article-id" value="{{ $article->id }}" class="article_ajax_id">
                    <a href="article_detail">
                        <div class="article_image">
                            {{-- <img src="/storage/{{ $article->image }}"> --}}
                            {{-- route('名前', ['クエリパラメータ' => 渡したい値])
                            --}}
                            {{-- ↓/fake?id=1 になる --}}
                            <a href="{{ route('individual', ['id' => \App\User::find($article->user_id)->id]) }}">
                                <p>{{ \App\User::find($article->user_id)->user_name }}</p>
                            </a>
                        </div>
                    </a>
                    <a href="{{ route('article_detail', ['id' => $article->id]) }}">
                        <p class="article_title">{{ $article->title }}</p>
                    </a>

                    <p class="article_description">{{ $article->description }}</p>
                    <p class="date">{{ $article->created_at }}</p>
                    <div class="ctf_container">
                        <div class="comment"><i class="far fa-comment fa-2x" style="color:#135f13;"></i></div>
                        {{-- <div><a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-hashtags="{{ $article->hash1_id }}" data-lang="en" data-show-count="false" data-url="{{ route('article_detail', ['id' => $article->id]) }}" data-text="{{ $article->title }}"></a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script></div> --}}
                        <div class="twitter"><a href="http://twitter.com/share?text={{ $article->title }}&url={{ route('article_detail', ['id' => $article->id]) }}&hashtags={{ $article->hash1_id }}" rel="nofollow" target="_blank" rel="noopener noreferrer"><i class="fab fa-twitter-square fa-2x" style="color:#1da1f2;"></i></a></div>
                        {{-- {{ dd(Illuminate\Support\Facades\DB::table("favs")->where("article_id", "=", $article->id)->where("user_id", "=", Auth::id())->first()) }} --}}
                        @if (Illuminate\Support\Facades\DB::table("favs")
                                ->where("article_id", "=", $article->id)
                                ->where("user_id", "=", Auth::id())->exists() != null)
                            <div class="fav">
                                <i id="" class="heart-button-l fa-heart fa-2x tippyLogin fas" style="color:#ff0000;"></i>
                            </div>
                        @else
                            <div class="fav">
                                <i id="" class="heart-button-l fa-heart fa-2x tippyGuest far" style="color:#ff0000;"></i>
                            </div>
                        @endif
                    </div>
                </div>

            @endforeach
        </div>
        @component('components.side-bar')
            {{-- ここはサイドバーです --}}
        @endcomponent
    </div>
    @guest
    <div class="tippy_template" style="display:none;">
        この記事を、マイページに<br>保存することが出来ます！<br>(ログインが必要です)
    </div>
    @else
    <div class="tippy_template" style="display:none;">
        この記事を、マイページに保存する！
    </div>
    @endguest
@endsection
