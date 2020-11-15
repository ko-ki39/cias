@extends('common_view.common')

@section('import')
    {{-- css等の読み込み場所 --}}

    <link rel="stylesheet" href="/css/post_page.css" type="text/css">
@endsection

@include('common_view.header', ['title' => '投稿ページ'])

@section('content')
    {{-- この下からbodyの中身を書き始める --}}
    <div class="main">
        <div class="content">
            <form action="{{ route('upload') }}" method="POST" enctype='multipart/form-data'>
                @csrf
                <div class="title">
                    <h2 id="title">タイトル</h2>
                    <input type="text" name="title"  placeholder="タイトルを入力（必須）" required>
                </div>

                <div class="hash">
                    <h3>ハッシュタグ</h3>
                    <input type="text" name="hash1" placeholder="ハッシュタグを入力">
                    <input type="text" name="hash2" placeholder="ハッシュタグを入力">
                    <input type="text" name="hash3" placeholder="ハッシュタグを入力">
                </div>

                <div class="post_inputs">
                    <div class="p_i_input_img">
                        <input type="file" class="post_file" name="image1" value="画像を入れる（必須）" required>
                        <img src="" alt="" class="post_img">
                    </div>
                    <textarea name="text1" id="" cols="30" rows="10" class="text"  placeholder="見出しとなる部分です（必須）" required></textarea>
                </div>

                <div class="post_inputs">
                    <div class="p_i_input_img">
                        <input type="file" class="post_file" name="image2">
                        <img src="" alt="" class="post_img">
                    </div>
                    <textarea name="text2" id="" cols="30" rows="10" class="text" placeholder="記事詳細で表示されます"></textarea>
                </div>

                <div class="post_inputs">
                    <div class="p_i_input_img">
                        <input type="file" class="post_file" name="image3">
                        <img src="" alt="" class="post_img">
                    </div>
                    <textarea name="text3" id="" cols="30" rows="10" class="text" placeholder="記事詳細で表示されます"></textarea>
                </div>

                <div class="post_inputs">
                    <div class="p_i_input_img">
                        <input type="file" class="post_file" name="image4">
                        <img src="" alt="" class="post_img">
                    </div>
                    <textarea name="text4" id="" cols="30" rows="10" class="text" placeholder="記事詳細で表示されます"></textarea>
                </div>

                <div class="post_inputs">
                    <div class="p_i_input_img">
                        <input type="file" class="post_file" name="image5">
                        <img src="" alt="" class="post_img">
                    </div>
                    <textarea name="text5" id="" cols="30" rows="10" class="text" placeholder="記事詳細で表示されます"></textarea>
                </div>

                <div class="post_inputs">
                    <div class="p_i_input_img">
                        <input type="file" class="post_file" name="image6">
                        <img src="" alt="" class="post_img">
                    </div>
                    <textarea name="text6" id="" cols="30" rows="10" class="text" placeholder="記事詳細で表示されます"></textarea>
                </div>

                <input type="submit" value="投稿する" id="post">
            </form>
        </div>
    </div>
<script src="/js/registerUserImage.js"></script>
@endsection
