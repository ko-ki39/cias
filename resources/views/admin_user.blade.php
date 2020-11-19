@extends('layouts.app')

@section('content')
    {{-- ユーザーの情報↓ --}}
    <a href="{{ route('generate_page') }}">アカウント生成</a>
    <a href="{{ route('auto_admin_change') }}">有効期限が過ぎたユーザーの権限変更</a>
    <a href="{{ route('admin_article') }}">記事情報</a>
    <a href="{{ route('admin_comment') }}">コメント情報</a>
    <form action="{{ route('admin_user_search') }}">
        <input type="text" name="search" placeholder="ユーザー名で検索" id="search">
        <input type="submit" value="検索">
    </form>
    <table>
        <th>@sortablelink('id', 'ID')</th>
        <th>ログインID</th>
        <th>名前</th>
        <th>E-mail</th>
        <th>権限</th>
        <th>権限変更</th>
        <th>@sortablelink('created_at', '作成日')</th>
        <th>@sortablelink('updated_at', '更新日')</th>
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
                                <option value="3">削除のみ許可 3</option>
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
@endsection
