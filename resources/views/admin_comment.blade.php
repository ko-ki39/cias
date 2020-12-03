@extends('layouts.app')

@section('content')
    {{-- ユーザーの情報↓ --}}
    <a href="{{ route('generate_page') }}">アカウント生成</a>
    <a href="{{ route('auto_admin_change') }}">有効期限が過ぎたユーザーの権限変更</a>
    <a href="{{ route('admin_user') }}">ユーザー情報</a>
    <a href="{{ route('admin_article') }}">記事情報</a>

    <form action="{{ route('admin_comment_search') }}">
        <select name="search_list" id="search_list">
            <option value="1">ユーザー名</option>
            <option value="2">記事タイトル</option>
            <option value="3">コメント内容</option>
        </select>
        <input type="text" placeholder="検索" name="search" id="search">
        <input type="submit" value="検索">
    </form>
    {{-- コメントの情報 --}}
    <form action="{{ route('comment_delete') }}" method="post" onsubmit="return comment_delete()">
        @csrf

        <input type="submit" value="まとめて削除">
        <table>
            <th>@sortablelink('id', 'ID')</th>
            <th>@sortablelink('user_id', 'ユーザーId')</th>
            <th>ユーザー名</th>
            <th>@sortablelink('article_id', '記事ID')</th>
            <th>記事タイトル</th>
            <th>コメント内容</th>
            <th>@sortablelink('created_at', '作成日')</th>
            @foreach ($comments as $key => $comment)
                <tr>
                    <td>{{ $comment->id }}</td>
                    <td>{{ $comment->user_id }}</td>
                    <td>{{ \App\User::find($comment->user_id)->user_name }}</td>
                    <td>{{ $comment->article_id }}</td>
                    <td>{{ \App\Article::find($comment->article_id)->title }}</td>
                    <td>{{ $comment->detail }}</td>
                    <td>{{ $comment->created_at }}<input type="checkbox" name="delete[]" value="{{ $comment->id }}"></td>

                </tr>
                @endforeach
            </table>
    </form>
@endsection
