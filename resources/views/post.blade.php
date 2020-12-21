@extends('common_view.common')

@section('import')
    {{-- css等の読み込み場所 --}}

    <link rel="stylesheet" href="/css/post_page.css" type="text/css">
    <link rel="stylesheet" href="/css/previewButton.css" type="text/css">
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
                    <span class="hash_span">#</span>
                    <input type="text" name="hash1" class="hash_text" placeholder="&quot;#&quot;は自動で付与されます">
                    <a href="#" class="hash_clearButton" onclick="event.preventDefault()" style="color:black; text-decoration:none; font-weight:bold; font-size:1.3em;">×</a>
                </div>
                <div class="hash_none" style="display: none">
                    <span class="hash_span">#</span>
                    <input type="text" name="hash2" class="hash_text" placeholder="&quot;#&quot;は自動で付与されます">
                    <a href="#" class="hash_clearButton" onclick="event.preventDefault()" style="color:black; text-decoration:none; font-weight:bold; font-size:1.3em;">×</a>
                </div>
                <div class="hash_none" style="display: none">
                    <span class="hash_span">#</span>
                    <input type="text" name="hash3" class="hash_text" placeholder="&quot;#&quot;は自動で付与されます">
                    <a href="#" class="hash_clearButton" onclick="event.preventDefault()" style="color:black; text-decoration:none; font-weight:bold; font-size:1.3em;">×</a>
                </div>

                <div id="more_hash">
                    <p>さらにハッシュタグを追加する(あと<span id="m_h_counter"> 2 </span>つ)<i class="fas fa-chevron-down"></i></p>
                </div>

                {{-- name="image1" name="image2" name="image3" ... "image6" --}}
                {{-- name="text1" name="text2" name="text3" ... "text6" --}}
                <div class="post_inputs">
                    <div class="p_i_input_img">
                        <div class="p_i_p">
                            <p>画像を挿入（１枚目は必須です）</p>
                            <input type="file" class="post_file" onclick="imageChange(0, this)" name="image1" value="画像を入れる（必須）" required>
                        </div>
                        <img src="" alt="" class="post_img">
                    </div>
                    <textarea name="text1" id="" cols="30" rows="10" class="text"  placeholder="説明文を入力してください。見出しとなる部分です（見出しは必須です）" required></textarea>
                </div>

                <div id="more_inputs">
                    <p>さらに記事内容を追加する(あと<span id="m_i_counter"> 5 </span>つ)<i class="fas fa-chevron-down"></i></p>
                </div>

                <div id="preview_button">
                    <a class="btn btn-border" style=""><span>プレビューを見る</span></a>
                </div>
                <div id="pop_background"></div>
                <div id="main_modal"></div>
            </form>
        </div>
    </div>
{{-- <script src="/js/registerUserImage.js"></script> --}}
<script src="/js/post_page.js"></script>
@endsection
