@extends('layouts.app')
@section('title', 'コメント情報ページ')
@section('import')
    {{-- css等の読み込み場所 --}}
    <link rel="stylesheet" href="/css/admin.css" type="text/css">
@endsection
@section('content')
    {{-- ユーザーの情報↓ --}}
    {{-- ユーザーの情報↓ --}}
    <a href="{{ route('auto_admin_change') }}" class="auto_admin">有効期限が過ぎたユーザーの権限変更</a>
    <a href="{{ route('generate_page') }}" class="generate">アカウント生成</a>
    <a href="{{ route('admin_user') }}" class="admin_user">ユーザー情報</a>
    <a href="{{ route('admin_article') }}" class="admin_article">記事情報</a>

    <form action="{{ route('admin_comment_search') }}">
        <select name="search_list" id="search_list">
            <option value="1">コメントしたユーザー名</option>
            <option value="2">コメントしたユーザーID</option>
            <option value="3">記事タイトル</option>
            <option value="4">コメント内容</option>
            <option value="5">good数</option>
            <option value="6">作成日</option>
        </select>
        <input type="text" placeholder="検索" name="search" id="search">
        <input type="submit" value="検索">
    </form>
    {{-- コメントの情報 --}}
    <form action="{{ route('comment_delete') }}" method="post" onsubmit="return comment_delete()">
        @csrf

        <input type="submit" value="まとめて削除" id="delete">
        <table border="1">
            <th>@sortablelink('id', 'ID')</th>
            <th>@sortablelink('user_id', 'コメントしたユーザーI
                D')</th>
            <th>コメントしたユーザー名</th>
            <th>@sortablelink('article_id', '記事ID')</th>
            <th>記事タイトル</th>
            <th>コメント内容</th>
            <th>@sortablelink('good_count', 'good数')</th>
            <th>@sortablelink('created_at', '作成日')</th>
            <th>削除</th>
            @foreach ($comments as $key => $comment)
                <tr>
                    <td>{{ $comment->id }}</td>
                    <td>{{ \App\User::find($comment->user_id)->user_id }}</td>
                    <td>{{ \App\User::find($comment->user_id)->user_name }}</td>
                    <td>{{ $comment->article_id }}</td>
                    <td>{{ \App\Article::find($comment->article_id)->title }}</td>
                    <td>{{ $comment->detail }}</td>
                    <td>{{ $comment->good_count }}</td>
                    <td>{{ $comment->created_at }}</td>
                    <td>
                        <input type="checkbox" name="delete[]" value="{{ $comment->id }}" class="checkbox">
                    </td>

                </tr>
            @endforeach
        </table>
    </form>
@endsection
