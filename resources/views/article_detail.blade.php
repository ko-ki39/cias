@section('content')

    @extends('common_view.common')

@section('import')
    {{-- css等の読み込み場所 --}}
    <link rel="stylesheet" href="/css/side_bar.css" type="text/css">
    <link rel="stylesheet" href="/css/article_detail.css" type="text/css">
<script src="/js/lightbox.js" type="text/javascript"></script>
    <link href="/css/lightbox.css" rel="stylesheet">
    <script src="/js/good.js"></script>
@endsection

@section('title')
    {{ $article->title }}
@endsection

{{-- この下からbodyの中身を書き始める --}}
<div class="main">
    <div class="article">
        <input type="hidden" name="article-id" value="{{ $article->id }}" class="article_ajax_id">
        <div id="a_article">
            <div class="sub">
                <div class="user">
                    <a href="{{ route('individual', ['id' => $user->id]) }}" class="u_image"><img
                            src="/storage/{{ $user->image }}" alt=""></a>
                    <!-- <a href="{{ route('post', ['id' => $user->id]) }}"> -->
                    <a href="{{ route('individual', ['id' => $user->id]) }}" class="u_name">{{ $user->user_name }}</a>
                    <p class="u_date">投稿した日 : {{ $article->article_at() }}</p>
                </div>
                <div id="tac_container">
                    <div class="title">
                        <h2>{{ $article->title }}</h2>
                    </div>
                    <div class="article_hashs">
                        @if ($article->hash1_id)
                            <a href="{{ route('hashtag_result', ['hash' => $article->hash1_id]) }}"
                                class="hash">#{{ $article->hash1_id }}</a>&nbsp;&nbsp;
                        @endif

                        @if ($article->hash2_id)
                            <a href="{{ route('hashtag_result', ['hash' => $article->hash2_id]) }}"
                                class="hash">#{{ $article->hash2_id }}</a>&nbsp;&nbsp;
                        @endif

                        @if ($article->hash3_id)
                            <a href="{{ route('hashtag_result', ['hash' => $article->hash3_id]) }}"
                                class="hash">#{{ $article->hash3_id }}</a>
                        @endif
                    </div>
                    <div class="ctf_container">
                        <x-sub-function :article="$article" /> {{-- いいねやツイッターなどの処理
                        --}}
                    </div>
                </div>
            </div>
            <div class="text">
                @for ($i = 0; $i < 6; $i++)
                    {{-- {{ dd($image) }} --}}
                    @if ($image[$i] != null)
                        <a href="/storage/{{ $image[$i] }}" data-lightbox="image">
                            <img src="/storage/{{ $image[$i] }}" class="big_image">
                        </a>
                        <p>{!! nl2br(e($text[$i])) !!}</p> {{-- 改行させる
                        --}}
                    @endif
                @endfor
            </div>
        </div>
        @guest
            <div id="comment_area">
                {{-- <img src="/images/図1.png" alt=""> --}}
            </div>
        @else
            <div id="comment_area">
                <h2>コメントを書く(400文字まで)</h2>
                <form action="/top/article_detail/post_comment" method="post">
                    @csrf
                    <input type="hidden" value="{{ $article->id }}" name="article_id">
                    <input type="hidden" name="comment_forcus_id" value="#comment_area">
                    <div class="c_a_u_info">
                        <img class="c_u_img" src="/storage/{{ Auth::user()->image }}" alt="">
                        <p class="c_u_name">{{ Auth::user()->user_name }}</p>
                    </div>
                    <div class="c_a_u_comment">
                        <textarea name="c_a_u_comment" id="" cols="" rows="">{{ old('c_a_u_comment') }}</textarea>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="c_a_u_submit">
                        <input type="submit" value="投稿する！">
                    </div>
                </form>
            </div>
        @endguest
        <div id="comment_list">
            <h2>コメント一覧</h2>
            @if (!$commentNullCheck)
                <div class="c_l_noComment">まだコメントがありません m(__)m</div>
            @else
                @foreach ($comments as $item)
                    {{-- @if (!$loop->first)
                        <hr>
                    @endif --}}
                    <div class="c_l_contents">
                        <div class="c_l_c_info">
                            <a href="{{ route('individual', ['id' => $item->user_id]) }}"><img class="c_l_c_img"
                                    src="/storage/{{ \App\User::where('id', '=', $item->user_id)->first()->image }}"
                                    alt=""></a>
                            <a href="{{ route('individual', ['id' => $item->user_id]) }}"
                                class="c_l_c_name">{{ \App\User::where('id', '=', $item->user_id)->first()->user_name }}</a>
                        </div>
                        <div class="c_l_c_detail">
                            <pre>{{ $item->detail }}</pre>

                            @if (Illuminate\Support\Facades\Auth::id() == $item->user_id)
                                {{-- コメントを投稿したユーザーと同一人物だったら
                                --}}
                                <form action="{{ route('detail_comment_delete') }}">
                                    <input type="hidden" value="{{ $article->id }}" name="article_id">
                                    <input type="hidden" value="{{ $item->id }}" name="comment_id">
                                    <input type="submit" value="削除">
                                </form>
                            @endif
                        </div>
                        <div class="c_l_c_other">
                            {{-- コメントへのいいね --}}
                            @if (Auth::id())
                                @if (\App\Good::where('comment_id', $item->id)
        ->where('user_id', Auth::id())
        ->exists() != null)
                                    {{-- すでにgoodしていた場合 --}}
                                    <a class="c_l_c_o_thums" comment_id="{{ $item->id }}" good_comment="1">
                                        <i id="" class="heart-button-l fa-heart fa-2x tippyLoginFav fas"
                                            style="color:#ff0000;"></i>
                                    </a>
                                @else
                                    {{-- goodされていない場合 --}}
                                    <a class="c_l_c_o_thums" comment_id="{{ $item->id }}" good_comment="0">

                                        <i id="" class="heart-button-l fa-heart fa-2x tippyGuestFav far"
                                            style="color:#ff0000;"></i>

                                    </a>
                                @endif
                                <pre>{{ $item->good_count }}</pre>
                            @endif
                            <time datetime="{{ $item->created_at }}">{{ $item->created_at }}</time>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>
    {{-- @component('components.side-bar') --}}
    {{-- ここはサイドバーです --}}
    <x-side_bar /> {{-- SideBar.phpコンポーネントを通して作成 --}}

    {{-- @endcomponent --}}
</div>
@guest
    <div class="tippy_template" style="display:none;">
        この記事を、マイページに<br>保存することが出来ます！<br>(ログインが必要です)
    </div>
    <div class="tippy_template" style="display:none;">
        この記事を、Twitterに<br>晒すことが出来ます！
    </div>
    <div class="tippy_template" style="display:none;">
        この記事に、コメントを<br>書くことが出来ます！<br>(ログインが必要です)
    </div>
@else
    <div class="tippy_template" style="display:none;">
        この記事を、マイページに保存する！
    </div>
    <div class="tippy_template" style="display:none;">
        この記事を、Twitterに晒す！
    </div>
    <div class="tippy_template" style="display:none;">
        この記事に、コメントを書く！
    </div>
@endguest
<script src="/js/fav.js"></script>
@endsection
