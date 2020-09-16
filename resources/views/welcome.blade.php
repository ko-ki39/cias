@extends('common_view.welcome_common')

@section('content')

@component('components.hamburger')
@endcomponent
    <div>
        <a href="#">ポートフォリオ集</a>
        <a href="#">自作ゲエム</a>
        <a href="/top">ブログのようなもの</a>
    </div>
@endsection