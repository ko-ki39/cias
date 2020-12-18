@extends('layouts.app')
@section('title', '管理者ページ')
@section('import')
    {{-- css等の読み込み場所 --}}
    <link rel="stylesheet" href="/css/admin.css" type="text/css">
@endsection
@section('content')
    {{-- ユーザーの情報↓ --}}
    <a href="{{ route('auto_admin_change') }}" class="auto_admin">有効期限が過ぎたユーザーの権限変更</a>
    <a href="{{ route('generate_page') }}" class="generate">アカウント生成</a>
    <a href="{{ route('admin_user') }}" class="admin_user">ユーザー情報</a>
    <a href="{{ route('admin_comment') }}" class="admin_comment">コメント情報</a>
    <a href="{{ route('admin_article') }}" class="admin_article">記事情報</a>

@endsection
