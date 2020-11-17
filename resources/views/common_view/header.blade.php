<div class="header clearfix">
    <div class="top">
        {{-- <i class="far fa-bars"></i> --}}
        @guest
        <a href="{{ url('top') }}" class="ztext">具志川<br>訓練校</a>
        <a href="{{ url('/register') }}" style="display:none;">Sign up</a>
        <a href=""></a>
        <a href="{{ url('/login') }}">Login</a>
        @else
        <a href="{{ url('top') }}" class="ztext" style="">具志川<br>訓練校</a>
        <a href="{{ route('individual', ['id' => Auth::id()]) }}" style="">{{ Auth::user()->user_name }}</a>
        <a href="{{ route('individual', ['id' => Auth::id()]) }}" class="h_u_img"><img src="/storage/{{ Auth::user()->image }}" alt=""></a>
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
    {{-- <div class="header_bot">
        <div class="tp_intro">
            <img src="/images/header_image1.png" alt="" class="header_image">
            <h2 class="title">{{ $title }}</h2>
        </div>
        <div class="ad">
            <a href="{{ route('post') }}">投稿するーーーーー</a>
        </div>
    </div> --}}
</div>
