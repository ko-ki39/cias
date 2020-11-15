@extends('common_view.welcome_common')

@section('content')
    <section id="welcome_section">
        {{-- <div class="header_band"></div> --}}
        <div id='stars'></div>
        <div id='stars2'></div>
        <div id='stars3'></div>
        <div class="welcome_image">
            <p>ようこそ、<br>キャリア情報<br>代替サイトへ</p>
            <p>本サイトは、<br>具志川職業能力開発校の<br>生徒たちの活動記録を<br>載せていくサイトです</p>
            <p>興味が湧いた方は、<br>社会人、学生問わず、<br>どうぞ、楽しんでいって<br>ください。</p>
        </div>
        <div id="main">
            <div><a href="#">訓練生はこちらから</a></div>
            <div><a href="/top">トップページへ</a></div>
        </div>
    </section>
@endsection