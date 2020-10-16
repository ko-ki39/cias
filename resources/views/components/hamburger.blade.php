<header id="hamburger_menu">
    @guest
    <nav class="nav fadein" id="nav_f">
        <ul>
            <li class="li_pro_img"></li>
            <li class="li_pro_name">ほげ太郎</li>
            <hr>
            <li class="li_pro_mypage">マイページへのリンクが入ります</li>
            <ul class="li_pro_comment_fav">
                <p>記事にコメントが来ています！</p>
                <li><a href="#">記事のタイトル</a></li>
            </ul>
            <li class="li_pro_ad">ADが入ります</li>
        </ul>
    </nav>
    @else
    <nav class="nav fadein" id="nav_f">
        <ul>
            <li class="li_pro_img">
                <a href="{{ route('individual', ['id' => Auth::id()]) }}"><img src="/storage/{{ Auth::user()->image }}" alt=""></a>
            </li>
            <li class="li_pro_name">
                <a href="{{ route('individual', ['id' => Auth::id()]) }}">
                    {{ Auth::user()->user_name }}
                </a>
            </li>
            <hr>
            @guest
            <ul class="li_pro_comment_fav">
                <li><a href="#">ログイン</a></li>
                <li><a href="#">サインアップ</a></li>
            </ul>
            @else
            <ul class="li_pro_comment_fav">
                <p>記事にコメントが来ています！</p>
                <li><a href="#">記事のタイトル</a></li>
            </ul>
            @endguest
            <li class="li_pro_ad">ADが入ります</li>
        </ul>
    </nav>
    @endguest
</header>
<div id="hum_target">
    <div class="hum_t_inner">
        <span class="hum_t_i_line hum_t_i_0" id="line0"></span>
        <span class="hum_t_i_line hum_t_i_1" id="line1"></span>
        <span class="hum_t_i_line hum_t_i_2" id="line2"></span>
    </div>
</div>