@extends('common_view.common')

@section('import')
{{-- css等の読み込み場所 --}}
<link rel="stylesheet" href="/css/side_bar.css" type="text/css">
<link rel="stylesheet" href="/css/individual.css" type="text/css">
@endsection

@section('content')
{{-- この下からbodyの中身を書き始める --}}
<div class="main">
    <div class="me">
        <div class="me_image"></div>
        <p>--------さんのマイページ</p>
    </div>
    <div class="content">
        <div class="article">
            <div class="image"></div>
            <p class="title">タイトル</p>
            <div class="add">
                <div class="comment">※</div>
                <div class="twitter">twi</div>
                <div class="fav">fa</div>
            </div>
        </div>
        <div class="article">
            <div class="image"></div>
            <p class="title">タイトル</p>
            <div class="add">
                <div class="comment">※</div>
                <div class="twitter">twi</div>
                <div class="fav">fa</div>
            </div>
        </div>
    </div>
    @component('components.side-bar')
    {{-- ここはサイドバーです --}}
    @endcomponent
</div>
@endsection
