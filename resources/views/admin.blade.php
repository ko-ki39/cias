@extends('layouts.app')
@section('title', '管理者ページ')
@section('content')
    {{-- ユーザーの情報↓ --}}
    <a href="{{ route('generate_page') }}">アカウント生成</a>
    <br>
    <a href="{{ route('auto_admin_change') }}">有効期限が過ぎたユーザーの権限変更</a>
    <br>

    <a href="{{ route('admin_user') }}">ユーザー情報</a>
    <br>

    <a href="{{ route('admin_article') }}">記事情報</a>
    <br>

    <a href="{{ route('admin_comment') }}">コメント情報</a>
@endsection
