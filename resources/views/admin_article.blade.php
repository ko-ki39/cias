@extends('layouts.app')
@section('title', '記事情報ページ')
@section('import')
    {{-- css等の読み込み場所 --}}
    <link rel="stylesheet" href="/css/admin.css" type="text/css">
@endsection
@section('content')
    <h3>記事詳細情報一覧</h3>
    {{-- ユーザーの情報↓ --}}
    <a href="{{ route('auto_admin_change') }}" class="auto_admin">有効期限が過ぎたユーザーの権限変更</a>
    <a href="{{ route('generate_page') }}" class="generate">アカウント生成</a>
    <a href="{{ route('admin_user') }}" class="admin_user">ユーザー情報</a>
    <a href="{{ route('admin_comment') }}" class="admin_comment">コメント情報</a>
    {{-- 記事の情報↓ --}}
    <form action="{{ route('admin_article_search') }}">
        <select name="search_list" id="search_list">
            <option value="1">ユーザー名</option>
            <option value="2">ユーザーID</option>
            <option value="3">タイトル</option>
            <option value="4">詳細</option>
            <option value="5">いいね数</option>
            <option value="6">コメント数</option>
            <option value="7">ハッシュ</option>
            <option value="8">作成日</option>
            <option value="9">更新日</option>

        </select>
        <input type="text" name="search" placeholder="検索" id="search">
        <input type="submit" value="検索">
    </form>
    <form action="{{ route('article_delete') }}" method="post" onsubmit="return article_delete()">
        @csrf
        <input type="submit" value="まとめて削除" id="delete">
        <table border="1">
            <th>@sortablelink('id', 'ID')</th>
            <th>@sortablelink('user_id', 'ユーザーID')</th>
            <th>ユーザー名</th>
            <th>タイトル</th>
            <th>詳細</th>
            <th>@sortablelink('fav_count', 'いいね数')</th>
            <th>@sortablelink('comment_count', 'コメント数')</th>
            <th>ハッシュ１</th>
            <th>ハッシュ２</th>
            <th>ハッシュ３</th>
            <th>@sortablelink('created_at', '作成日')</th>
            <th>@sortablelink('updated_at', '更新日')</th>
            <th>削除</th>
            @foreach ($articles as $key => $article)
                <tr>
                    <td>{{ $article->id }}</td>
                    <td>{{ \App\User::find($article->user_id)->user_id }}</td>
                    <td>{{ \App\User::find($article->user_id)->user_name }}</td>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->description }}</td>
                    <td>{{ $article->fav_count }}</td>
                    <td>{{ $article->comment_count }}</td>
                    <td>{{ $article->hash1_id }}</td>
                    <td>{{ $article->hash2_id }}</td>
                    <td>{{ $article->hash3_id }}</td>
                    <td>{{ $article->created_at }}</td>
                    <td>{{ $article->updated_at }}</td>
                    <td>
                        <input type="checkbox" name="delete[]" value="{{ $article->id }}" class="checkbox">
                    </td>
                </tr>
            @endforeach
        </table>
    </form>
@endsection
