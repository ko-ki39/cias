@extends('layouts.app')
@section('title', '記事情報ページ')
@section('content')
    {{-- ユーザーの情報↓ --}}
    <a href="{{ route('generate_page') }}">アカウント生成</a>
    <a href="{{ route('auto_admin_change') }}">有効期限が過ぎたユーザーの権限変更</a>
    <a href="{{ route('admin_user') }}">ユーザー情報</a>
    <a href="{{ route('admin_comment') }}">コメント情報</a>
    {{-- 記事の情報↓ --}}
    <form action="{{ route('admin_article_search') }}">
        <select name="search_list" id="search_list">
            <option value="1">ユーザー名</option>
            <option value="2">タイトル</option>
            <option value="3">詳細</option>
            <option value="4">いいね数</option>
            <option value="5">コメント数</option>
            <option value="6">ハッシュ</option>
            <option value="7">作成日</option>
            <option value="8">更新日</option>

        </select>
        <input type="text" name="search" placeholder="検索" id="search">
        <input type="submit" value="検索">
    </form>
    <form action="{{ route('article_delete') }}" method="post" onsubmit="return article_delete()">
        @csrf
        <input type="submit" value="まとめて削除する">
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
            @foreach ($articles as $key => $article)
                <tr>
                    <td>{{ $article->id }}</td>
                    <td>{{ $article->user_id }}</td>
                    <td>{{ \App\User::find($article->user_id)->user_name }}</td>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->description }}</td>
                    <td>{{ $article->fav_count }}</td>
                    <td>{{ $article->comment_count }}</td>
                    <td>{{ $article->hash1_id }}</td>
                    <td>{{ $article->hash2_id }}</td>
                    <td>{{ $article->hash3_id }}</td>
                    <td>{{ $article->created_at }}</td>
                    <td>{{ $article->updated_at }}

                        <input type="checkbox" name="delete[]" value="{{ $article->id }}">
                </tr>
            @endforeach

    </form>
    </table>
@endsection
