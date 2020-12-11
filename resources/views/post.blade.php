@extends('common_view.common')

@section('import')
    {{-- css等の読み込み場所 --}}

    <link rel="stylesheet" href="/css/post_page.css" type="text/css">
@endsection

@section('title', '記事投稿ページ')

@section('content')
    {{-- この下からbodyの中身を書き始める --}}
    <h1>記事投稿ページ😁</h1>
    <div class="main">
        <div class="content">
            <form action="{{ route('upload') }}" method="POST" enctype='multipart/form-data'  onsubmit="return article_upload()">
                @csrf
                <div class="title">
                    <h3 id="title">タイトル</h3>
                    <input type="text" name="title"  placeholder="タイトルを入力（必須）" required>
                    <a href="#" id="title_clearButton" onclick="event.preventDefault()" style="color:black; text-decoration:none; font-weight:bold; font-size:1.3em;">×</a>
                </div>

                <div class="hash">
                    <h3>ハッシュタグ</h3>
                    <input type="text" name="hash1" placeholder="ハッシュタグを入力">
                    <a href="#" class="hash_clearButton" onclick="event.preventDefault()" style="color:black; text-decoration:none; font-weight:bold; font-size:1.3em;">×</a>
                </div>
                <div class="hash_none" style="display: none">
                    <input type="text" name="hash2" placeholder="ハッシュタグを入力">
                    <a href="#" class="hash_clearButton" onclick="event.preventDefault()" style="color:black; text-decoration:none; font-weight:bold; font-size:1.3em;">×</a>
                </div>
                <div class="hash_none" style="display: none">
                    <input type="text" name="hash3" placeholder="ハッシュタグを入力">
                    <a href="#" class="hash_clearButton" onclick="event.preventDefault()" style="color:black; text-decoration:none; font-weight:bold; font-size:1.3em;">×</a>
                </div>

                <div id="more_hash">
                    <p>さらにハッシュタグを追加する<span></span></p>
                </div>

                <div class="post_inputs">
                    <div class="p_i_input_img">
                        {{-- name="image1" name="image2" name="image3" ... "image6" --}}
                        <div class="p_i_p">
                            <p>画像を挿入</p>
                            <input type="file" class="post_file" name="image1" value="画像を入れる（必須）" required>
                        </div>
                        <img src="" alt="" class="post_img">
                    </div>
                    <textarea name="text1" id="" cols="30" rows="10" class="text"  placeholder="見出しとなる部分です（必須）" required></textarea>
                </div>

                <input type="submit" value="投稿する" id="post">
            </form>
        </div>
    </div>
{{-- <script src="/js/registerUserImage.js"></script> --}}
<script src="/js/post_page.js"></script>
@endsection
