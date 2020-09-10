@extends('common_view.common')

@section('import')
{{-- css等の読み込み場所 --}}
<link rel="stylesheet" href="/css/side_bar.css" type="text/css">
@endsection

@section('content')
{{-- この下からbodyの中身を書き始める --}}
<div class="main">
    @component('components.article')
    {{-- 記事一覧表示場所 --}}
    @endcomponent
    @component('components.side-bar')
    {{-- ここはサイドバーです --}}
    @endcomponent
</div>
@endsection
