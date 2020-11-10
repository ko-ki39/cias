@section('content')

@extends('common_view.common')

    @section('import')
        {{-- css等の読み込み場所 --}}
        <link rel="stylesheet" href="/css/side_bar.css" type="text/css">
        <link rel="stylesheet" href="/css/article_detail.css" type="text/css">
    @endsection

@include('common_view.header', ['title' => '記事詳細ページ'])

    {{-- この下からbodyの中身を書き始める --}}
    <div class="main">
        <div class="article">
            <input type="hidden" name="article-id" value="{{ $article->id }}" class="article_ajax_id">
            <div class="sub">
                <div class="user">
                    <a href="{{ route('individual', ['id' => $user->id]) }}" class="u_image"><img src="/storage/{{ $user->image }}" alt=""></a>
                    <!-- <a href="{{ route('post', ['id' => $user->id]) }}"> -->
                    <a href="{{ route('individual', ['id' => $user->id]) }}" class="u_name">{{ $user->user_name }}</a>
                    <p class="u_date">投稿した日 : {{ $article->created_at }}</p>
                </div>
                <div class="title">
                    <h2>{{ $article->title }}</h2>
                </div>
                <div class="article_hashs">
                    <p class="hash">#{{ $article->hash1_id }}</p>&nbsp;&nbsp;
                    <p class="hash">#{{ $article->hash2_id }}</p>&nbsp;&nbsp;
                    <p class="hash">#{{ $article->hash3_id }}</p>
                </div>
                <div class="ctf_container">
                    <div class="comment"><a href="#comment_area"><i class="far fa-comment fa-2x comment-button-l" style="color:#259b25;"></i></a></div>
                    <div class="twitter"><a href="http://twitter.com/share?text={{ $article->title }}&url={{ route('article_detail', ['id' => $article->id]) }}&hashtags={{ $article->hash1_id }}" rel="nofollow" target="_blank" rel="noopener noreferrer"><i class="fab fa-twitter-square fa-2x twitter-button-l" style="color:#1da1f2;"></i></a></div>
                    @if (Illuminate\Support\Facades\DB::table("favs")
                            ->where("article_id", "=", $article->id)
                            ->where("user_id", "=", Auth::id())->exists() != null)
                    <div class="fav">
                        <i id="" class="heart-button-l fa-heart fa-2x tippyLoginFav fas" style="color:#ff0000;"></i>
                    </div>
                    @else
                        <div class="fav">
                            <i id="" class="heart-button-l fa-heart fa-2x tippyGuestFav far" style="color:#ff0000;"></i>
                        </div>
                    @endif
                </div>
            </div>
            <div class="text">
                @for ($i = 0; $i < 6; $i++)
                {{-- {{ dd($image) }} --}}
                    @if ($image[$i] != null)
                        <img src="/storage/{{ $image[$i] }}" class="big_image">
                        <p>{{ $text[$i] }}</p>
                    @endif
                @endfor
            </div>
            @guest
            <div id="comment_area">
                <img src="/storage/images/図1.png" alt="">
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
                        <textarea name="c_a_u_comment" id="" cols="" rows="10">{{ old('c_a_u_comment') }}</textarea>
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
                @foreach ($comments as $item)
                    @if (!$loop->first)
                        <hr>
                    @endif
                    <div class="c_l_contents">
                        <div class="c_l_c_info">
                            <a href="{{ route('individual', ['id' => $item->user_id]) }}"><img class="c_l_c_img" src="/storage/{{ Illuminate\Support\Facades\DB::table('users')->where("id", "=", $item->user_id)->first()->image }}" alt=""></a>
                            <a href="{{ route('individual', ['id' => $item->user_id]) }}" class="c_l_c_name">{{ Illuminate\Support\Facades\DB::table('users')->where("id", "=", $item->user_id)->first()->user_name }}</a>
                        </div>
                        <div class="c_l_c_detail">
                            <pre>{{ $item->detail }}</pre>
                        </div>
                        <div class="c_l_c_other">
                            <i class="far fa-thumbs-up"></i> | <i class="far fa-thumbs-down"></i>
                            <time datetime="{{ $item->created_at }}">{{ $item->created_at }}</time>
                        </div>
                    </div>
                @endforeach
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
        この記事を、Twitterに<br>晒すことが出来ます！<br>(ログインが必要です)
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
@endsection
