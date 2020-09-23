@extends('common_view.common')

@section('import')
    {{-- css等の読み込み場所 --}}

    <link rel="stylesheet" href="/css/post_page.css" type="text/css">
@endsection

@section('content')
    {{-- この下からbodyの中身を書き始める --}}
    <div class="main">
        <div class="content">
            <form action="{{ route('upload') }}" method="post" enctype='multipart/form-data'>
                @csrf

                <input type="file" class="file" name="image1">
                <textarea name="text1" id="" cols="30" rows="10" class="text"></textarea>
                <input type="file" class="file" name="image1">
                <textarea name="text2" id="" cols="30" rows="10" class="text"></textarea>
                <input type="file" class="file" name="image1">
                <textarea name="text3" id="" cols="30" rows="10" class="text"></textarea>
                <input type="file" class="file" name="image1">
                <textarea name="text4" id="" cols="30" rows="10" class="text"></textarea>
                <input type="file" class="file" name="image1">
                <textarea name="text5" id="" cols="30" rows="10" class="text"></textarea>
                <input type="file" class="file" name="image1">
                <textarea name="text6" id="" cols="30" rows="10" class="text"></textarea>

                <input type="submit" value="投稿する">
            </form>
        </div>
    </div>

@endsection
