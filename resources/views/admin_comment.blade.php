@extends('layouts.app')

@section('content')
    {{-- ユーザーの情報↓ --}}
    <a href="{{ route('generate_page') }}">アカウント生成</a>
    <a href="{{ route('auto_admin_change') }}">有効期限が過ぎたユーザーの権限変更</a>
    <a href="{{ route('admin_user') }}">ユーザー情報</a>
    <a href="{{ route('admin_article') }}">記事情報</a>

    {{-- コメントの情報 --}}
    <table>
        <th>ID</th>
        <th>ユーザーID</th>
        <th>ユーザー名</th>
        <th>記事ID</th>
        <th>記事タイトル</th>
        <th>コメント内容</th>
        <th>作成日</th>
        @foreach ($comments as $key => $comment)
            <tr>
                <td>{{ $comment->id }}</td>
                <td>{{ $comment->user_id }}</td>
                <td>{{ \App\User::find($comment->user_id)->user_name }}</td>
                <td>{{ $comment->article_id }}</td>
                <td>{{ \App\Article::find($comment->article_id)->title }}</td>
                <td>{{ $comment->detail }}</td>
                <td>{{ $comment->created_at }}
                    <a href="{{ route('comment_delete', ['id' => $comment->id]) }}">
                        削除
                    </a></td>
            </tr>
        @endforeach
    </table>
@endsection
