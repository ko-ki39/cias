@extends('common_view.common')

@section('import')
    {{-- css等の読み込み場所 --}}

    <link rel="stylesheet" href="/css/post_page.css" type="text/css">
@endsection

@section('content')
    {{-- この下からbodyの中身を書き始める --}}
    <div class="main">
        <div class="content">
            <input type="file" class="file">
            <textarea name="text" id="" cols="30" rows="10" class="text"></textarea>
            <input type="file" class="file">
            <textarea name="text" id="" cols="30" rows="10" class="text"></textarea>
            <input type="file" class="file">
            <textarea name="text" id="" cols="30" rows="10" class="text"></textarea>
            <input type="file" class="file">
            <textarea name="text" id="" cols="30" rows="10" class="text"></textarea>
            <input type="file" class="file">
            <textarea name="text" id="" cols="30" rows="10" class="text"></textarea>
            <input type="file" class="file">
            <textarea name="text" id="" cols="30" rows="10" class="text"></textarea>
        </div>
    </div>

@endsection
