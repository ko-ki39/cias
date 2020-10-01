<div class="header clearfix">
    <div class="top">
        <i class="far fa-bars"></i>
        @guest
            <h2>Sign up</h2>
            <h2>Login</h2>
        @else
            <h2>Logout</h2>
        @endguest
    </div>
    <div class="header_bot">
        <div class="tp_intro">
            <a href="#">ポートフォリオページへ</a>
            <a href="#">ゲームページへ</a>
            <br>
            <h2>&lt;--削除済み--&gt;の生徒が作った作品を紹介するページです！！</h2>
        </div>
        <div class="ad">
            {{-- 広告を入れる場所 --}}
        </div>
    </div>
</div>
