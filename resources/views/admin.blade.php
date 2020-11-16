@extends('layouts.app')

@section('content')
    {{-- ユーザーの情報↓ --}}
    <a href="{{ route('generate_page') }}">アカウント生成</a>
    {{-- <a href="{{ route('user_admin_change') }}">有効期限が過ぎたユーザーの権限変更</a> --}}
    <table>
        <th>ID</th>
        <th>ログインID</th>
        <th>名前</th>
        <th>E-mail</th>
        <th>権限</th>
        <th>権限変更</th>
        <th>秘密の質問のID</th>
        <th>秘密の質問答え</th>
        <th>作成日</th>
        <th>更新日</th>
        @foreach ($users as $key => $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->user_id }}</td>
                <td>{{ $user->user_name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>
                    {{-- 管理者が一人もいなくなったらまずいからuser_idが1のユーザーは変更できなくする
                    --}}
                    @if ($user->id != 1)
                        <form action="{{ route('admin_change', ['id' => $user->id]) }}" method="get" enctype='multipart/form-data'>
                            @csrf
                            <select name="authority">
                                <option value="1">管理者権限 1</option>
                                <option value="2" selected>投稿許可権限 2</option>
                            </select>
                            <input type="submit" value="変更">
                        </form>
                    @endif

                </td>
                <td>{{ $user->secret_question_id }}</td>
                <td>{{ $user->secret_answer }}</td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->updated_at }}
                    @if ($user->id != 1)
                        <a href="{{ route('user_delete', ['id' => $user->id]) }}">
                            削除
                        </a>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
    <br>

    {{-- 記事の情報↓ --}}
    <table>
        <th>ID</th>
        <th>ユーザーID</th>
        <th>タイトル</th>
        <th>詳細</th>
        <th>ハッシュ１</th>
        <th>ハッシュ２</th>
        <th>ハッシュ３</th>
        <th>作成日</th>
        <th>更新日</th>
        @foreach ($articles as $key => $article)
            <tr>
                <td>{{ $article->id }}</td>
                <td>{{ $article->user_id }}</td>
                <td>{{ $article->title }}</td>
                <td>{{ $article->description }}</td>
                <td>{{ $article->hash1_id }}</td>
                <td>{{ $article->hash2_id }}</td>
                <td>{{ $article->hash3_id }}</td>
                <td>{{ $article->created_at }}</td>
                <td>{{ $article->updated_at }}
                    <a href="{{ route('article_delete', ['id' => $article->id]) }}">
                        削除
                    </a></td>
            </tr>
        @endforeach
    </table>

    {{-- コメントの情報 --}}
    <table>
        <th>ID</th>
        <th>ユーザーID</th>
        <th>記事ID</th>
        <th>コメント内容</th>
        <th>作成日</th>
        @foreach ($comments as $key => $comment)
            <tr>
                <td>{{ $comment->id }}</td>
                <td>{{ $comment->user_id }}</td>
                <td>{{ $comment->article_id }}</td>
                <td>{{ $comment->detail }}</td>
                <td>{{ $comment->created_at }}
                    <a href="{{ route('comment_delete', ['id' => $comment->id]) }}">
                        削除
                    </a></td>
            </tr>
        @endforeach
    </table>
@endsection
