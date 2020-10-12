<div class="header clearfix">
    <div class="top">
        {{-- <i class="far fa-bars"></i> --}}
        @guest
        <div class="arrow" style="margin-right:460px;">
            <p>click to open My Menu</p>
            <span></span>
        </div>
        <a href="{{ url('/register') }}">Sign up</a>
        <a href="{{ url('/login') }}">Login</a>
        @else
        <div class="arrow">
            <p>click to open My Menu</p>
            <span></span>
        </div>
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        @endguest
    </div>
    <div class="header_bot">
        <div class="tp_intro">
            <a href="#">ポートフォリオページへ</a>
            <a href="#">ゲームページへ</a>
            <br>
            <h2>心眼を極めるべし、いつでも傍には不都合な真実がある。</h2>
        </div>
        <div class="ad">
            {{-- 広告を入れる場所 --}}
        </div>
    </div>
</div>
