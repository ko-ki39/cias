@section('content')

    @extends('common_view.common')


@section('title', '記事一覧ページ')
@section('import')
    {{-- css等の読み込み場所 --}}
    <link rel="stylesheet" href="/css/side_bar.css" type="text/css">
    <link rel="stylesheet" href="/css/top.css" type="text/css">
@endsection


{{-- この下からbodyの中身を書き始める --}}
<div class="main">
    <div class="content">
        {{-- <form action="{{ route('search_department') }}">
            <select name="search_department" id="search_department">
                <option value="0">すべて</option>
                <option value="1">オフィスビジネス科（前期）</option>
                <option value="2">オフィスビジネス科（後期）</option>
                <option value="3">自動車整備科</option>
                <option value="4">電気システム科</option>
                <option value="5">メディア・アート科</option>
                <option value="6">情報システム科</option>
                <option value="7">造園ガーデニング科</option>
                <option value="8">総合実務科（知的障がい者対象）</option>
            </select>
            <input type="submit" value="絞り込む">
        </form> --}}
        <form action="{{ route('search') }}" method="get">
            <table>
                <tr>
                    <td>
                        <p class="depa_search">学科で絞る:</p>
                    </td>
                    <td>
                        <div class="depa_search">
                            <select name="search_department" id="search_department">
                                <option value="0">すべて</option>
                                <option value="1">オフィスビジネス科（前期）</option>
                                <option value="2">オフィスビジネス科（後期）</option>
                                <option value="3">自動車整備科</option>
                                <option value="4">電気システム科</option>
                                <option value="5">メディア・アート科</option>
                                <option value="6">情報システム科</option>
                                <option value="7">造園ガーデニング科</option>
                                <option value="8">総合実務科（知的障がい者対象）</option>
                            </select>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="search">記事内容で絞る:</p>
                    </td>
                    <td>
                        <div class="search">
                            <select name="search_condition" id="search_condition">
                                <option value="1">すべて</option>
                                <option value="2">タイトル</option>
                                <option value="3">説明</option>
                                <option value="4">ユーザー名</option>
                            </select>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td id="fa-search-text">
                        <i class="fas fa-search"></i>
                    </td>
                    <td>
                        <div class="txt_search">
                            <input type="text" name="search" id="search" placeholder="検索" autocomplete="off">
                            <input type="submit" value="検索">
                            <div id="search_list">
                                <ul id="search_result">
                                </ul>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </form>

        @foreach ($articles as $article)

            <div class="article">
                <input type="hidden" name="article-id" value="{{ $article->id }}" class="article_ajax_id">
                <a href="article_detail">
                    <div class="article_userName">
                        <a href="{{ route('individual', ['id' => $article->user_id]) }}" class="top_h_u_img"><img
                                src="/storage/{{ \App\User::find($article->user_id)->image }}" alt=""></a>
                        <a href="{{ route('individual', ['id' => \App\User::find($article->user_id)->id]) }}"
                            class="text">
                            {{ \App\User::find($article->user_id)->user_name }}
                            {{-- <img src="/storage/{{ $article->image }}" alt="">
                            --}}
                        </a>
                    </div>
                    <div class="article_image">
                        <img src="/storage/{{ $article->image }}" alt="">
                        {{-- <img src="/storage/{{ $article->image }}">
                        --}}
                        {{-- route('名前', ['クエリパラメータ' => 渡したい値])
                        --}}

                        {{-- ↓/fake?id=1 になる --}}
                    </div>
                </a>
                <div class="article_title">
                    <a href="{{ route('article_detail', ['id' => $article->id]) }}" class="text">
                        {{ $article->title }}
                    </a>
                </div>
                <pre class="article_description text">{{ $article->description }}</pre>
                <div class="ctf_container">
                    <div class="article_hashs">
                        @if($article->hash1_id)
                        <a href="{{ route('hashtag_result', ['hash' => $article->hash1_id]) }}" class="hash">#{{ $article->hash1_id }}</a>&nbsp;&nbsp;
                        @endif

                        @if($article->hash2_id)
                        <a href="{{ route('hashtag_result', ['hash' => $article->hash2_id]) }}" class="hash">#{{ $article->hash2_id }}</a>&nbsp;&nbsp;
                        @endif

                        @if($article->hash3_id)
                        <a href="{{ route('hashtag_result', ['hash' => $article->hash3_id]) }}" class="hash">#{{ $article->hash3_id }}</a>
                        @endif
                    </div>
                    <p class="date">{{ $article->created_at }}</p>

                    @if ($article->comment_count == 0)
                        {{-- コメントがない場合 --}}
                        <div class="comment"><a
                                href="{{ route('articleDetailForcus', ['id' => $article->id . '#comment_area']) }}"><i
                                    class="far fa-comment fa-2x comment-button-l" style="color:#259b25;"></i></a>
                        </div>

                    @else
                        {{-- コメントがある場合 --}}
                        <div class="comment"><a
                                href="{{ route('articleDetailForcus', ['id' => $article->id . '#comment_area']) }}"><i
                                    class="fas fa-comment fa-2x comment-button-l" style="color:#259b25;"></i></a>
                            {{ $article->comment_count }}{{-- コメントの数
                            --}}
                        </div>
                    @endif

                    <div class="twitter"><a
                            href="http://twitter.com/share?text={{ $article->title }}&url={{ route('article_detail', ['id' => $article->id]) }}&hashtags={{ $article->hash1_id }}"
                            rel="nofollow" target="_blank" rel="noopener noreferrer"><i
                                class="fab fa-twitter-square fa-2x twitter-button-l" style="color:#1da1f2;"></i></a>
                    </div>
                    @if (\App\Fav::where('article_id', '=', $article->id)
        ->where('user_id', '=', Auth::id())
        ->exists() != null)
                        <div class="fav">
                            <i id="" class="heart-button-l fa-heart fa-2x tippyLoginFav fas" style="color:#ff0000;"></i>
                        </div>
                    @else
                        <div class="fav">
                            <i id="" class="heart-button-l fa-heart fa-2x tippyGuestFav far" style="color:#ff0000;"></i>
                            @if ($article->fav_count != 0)
                                {{ $article->fav_count }}
                            @endif
                        </div>
                    @endif
                </div>
            </div>

        @endforeach
        @if (!empty($message))
            {{-- 検索結果がなかった場合のメッセージ --}}
            <p id="message">{!! $message !!}</p>
        @endif
        {{ $articles->links() }}
    </div>

    {{-- @component('components.side-bar') --}}
    {{-- ここはサイドバーです --}}
    <x-side_bar /> {{-- SideBar.phpコンポーネントを通して作成 --}}
    {{-- @endcomponent --}}
</div>
@guest
    <div class="tippy_template" style="display:none;">
        この記事を、マイページに<br>保存することが出来ます！<br><small style="font-size: 0.7rem;">( Sorry... m(__)m <br>訓練生のみが使える機能です )</small>
    </div>
    <div class="tippy_template" style="display:none;">
        この記事を、Twitterに<br>晒すことが出来ます！<br><small style="font-size: 0.7rem;">( Sorry... m(__)m <br>訓練生のみが使える機能です )</small>
    </div>
    <div class="tippy_template" style="display:none;">
        この記事に、コメントを<br>書くことが出来ます！<br><small style="font-size: 0.7rem;">( Sorry... m(__)m <br>訓練生のみが使える機能です )</small>
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
<script>
    'use strict';

    const sourceClass = document.getElementsByClassName("text");
    var searchText = getParam('search'); //クエリパラメータ取得する関数
    var searchList = getParam('search_condition'); //選択し取得
    var searchDepartment = getParam('search_department'); //学科
    var regExp = new RegExp(searchText, "g"); //検索したい文字を変換するためお関数
    ;

    //↓絞り込みの条件保持
    var search = document.getElementById('search_department');

    switch (searchDepartment) {
        case '1':
            search.options[1].selected = true;
            break;
        case '2':
            search.options[2].selected = true;
            break;
        case '3':
            search.options[3].selected = true;
            break;
        case '4':
            search.options[4].selected = true;
            break;
        case '5':
            search.options[5].selected = true;
            break;
        case '6':
            search.options[6].selected = true;
            break;
        case '7':
            search.options[7].selected = true;
            break;
        case '8':
            search.options[8].selected = true;
            break;
        default:
            search.options[0].selected = true;
            break;
    }

    //↓検索条件の保持
    document.getElementById('search').value = searchText;

    var select = document.getElementById('search_condition');

    switch (searchList) { //選択を保持する処理
        case '1':
            select.options[0].selected = true;
            break;
        case '2':
            select.options[1].selected = true;
            break;
        case '3':
            select.options[2].selected = true;
            break;
        case '4':
            select.options[3].selected = true;
            break;
        default:
            select.options[0].selected = true;
            break;
    }

    for (var i = 0; i < sourceClass.length; i++) {
        const sourceText = sourceClass[i].innerHTML;
        var text = `<span style='background:yellow'>${searchText}</span>`; //変換後の文字列
        var changeText = sourceText.replace(regExp, text); //特定の文字列のみ変換

        document.getElementsByClassName("text")[i].innerHTML = changeText; //入れ替える
    }

    function getParam(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
    }

</script>
<script src="/js/hash.js"></script>
<script src="/js/fav.js"></script>
<style>
    .pagination {
        font-weight: bold;
    }

</style>
@endsection
