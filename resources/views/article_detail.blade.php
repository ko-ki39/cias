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
                    <!-- <a href="{{ route('post', ['id' => $user->id]) }}"> -->
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
                    <p class="hash">{{ $article->hash2_id }}</p>
                    <p class="hash">{{ $article->hash3_id }}</p>
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
                @guest
                <div id="comment_area">
                    <img src="/storage/images/図1.png" alt="">
                </div>
                @else
                <div id="comment_area">
                    <h2>コメントを書く(400文字まで)</h2>
                    <form action="/top/article_detail/post_comment" method="post">
                        @csrf
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
        </div>
        {{-- @component('components.side-bar') --}}
            {{-- ここはサイドバーです --}}
            <x-side_bar /> {{-- SideBar.phpコンポーネントを通して作成 --}}

        {{-- @endcomponent --}}
    </div>
@endsection
