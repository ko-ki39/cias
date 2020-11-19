@extends('layouts.app')

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
        </select>
        <input type="text" name="search" placeholder="検索" id="search">
        <input type="submit" value="検索">
    </form>
    <table>
        <th>ID</th>
        <th>ユーザーID</th>
        <th>ユーザー名</th>
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
                <td>{{ \App\User::find($article->user_id)->user_name }}</td>
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
@endsection
