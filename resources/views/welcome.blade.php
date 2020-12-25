@extends('common_view.welcome_common')

@section('content')
    <section id="welcome_section">
        <div class="welcome_image">
            <p>ようこそ、<br>キャリア情報代替サイトへ</p>
            <p>本サイトは、<br>具志川職業能力開発校の<br>生徒たちの活動記録を<br>載せていくサイトです</p>
            <p>興味が湧いた方は、<br>社会人、学生問わず、<br><br><br>どうぞ、<br>楽しんでいってください。</p>
        </div>
        <div id="main">
            <div><a href="{{ route('login') }}" style="color:#ffffff; text-decoration:none; font-size:1.4em; text-align:center; display:flex; justify-content:center; align-items:center;"><span style="display:inline-block; margin:auto;">訓練生はこちらから</span></a></div>
            <div><a href="/top" style="color:#ffffff; text-decoration:none; font-size:1.4em; text-align:center; display:flex; justify-content:center; align-items:center;"><span style="display:inline-block; margin:auto;">トップページへ</span></a></div>
        </div>
    </section>
@endsection
